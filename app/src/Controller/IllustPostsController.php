<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\UsersController;
use App\Controller\IllustsController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
require ROOT."/vendor/autoload.php";
use phpseclib\Net\SFTP;

class IllustPostsController extends AppController
{
    
    //共通処理
    public function initialize()
    {
        parent::initialize();
        $url = Router::url('/', true); 
        $this->set(compact('url'));
        $this->Achievements = TableRegistry::get('achievements');
    }

    //イラスト新規追加ページ
    public function illustAdd()
    {
        $user = $this->Auth->user('id');
        $this->set('user_id', $user);
    }

    //イラスト情報を更新する処理
    public function illustsSave()
    {
    $illusts = TableRegistry::getTableLocator()->get('illusts');
    $post = $illusts->newEntity();
        if($this->request->is('post')){
            $this->illustAchieveUpdate($this->request->getData('user_id'));
            $this->illustUpload();
            $this->illustSftp();
            $post = $illusts->patchEntity($post,$this->request->getData());
            $illusts->save($post);
            return $this->redirect('/Users/mypage');
        }
    }

    //画像アップロード処理
    function illustUpload(){
        //ファイルアップロード
        //URLに複合主キーを入れる
        $user_id = $this->request->getData('user_id');
        $urlGenerate = $user_id.'_'.$this->getAchievementNum($user_id).'_';
        $fileName = $this->request->getData('file');
        move_uploaded_file( //TODO: ここの処理をFTPあたりに変換して別途ストレージサーバを立てそこに保管する
            $fileName['tmp_name'], 
            TMP."img/".$urlGenerate.$fileName['name']
        );
        
        //DB保存用のURL
        $imgUrl = 'illust_img/'.$urlGenerate.$fileName['name'];
        $this->request = $this->request->withData('illust_url', $imgUrl);
        return $this->request;
    }

    function illustSftp(){
        $user_id = $this->request->getData('user_id');
        $urlGenerate = $user_id.'_'.$this->getAchievementNum($user_id).'_';
	    $fileName = $this->request->getData('file');
        $local_img = TMP."img/".$urlGenerate.$fileName['name'];
        $remote_img = "illust_img/".$urlGenerate.$fileName['name'];
	    $sftp = new SFTP(SFTP_SERVER, 122);
	    $sftp->login(SFTP_USER, SFTP_PASSWORD);
	
        $sftp->put($remote_img, $local_img, SFTP::SOURCE_LOCAL_FILE);
    }

    //コンテンツ数をカウントする
    function illustAchieveUpdate($user_id)
    {
    $getAchieve = $this->Achievements->exists(['user_id' => $user_id]);
        if($getAchieve){ //すでに投稿があるか判定
            $post = $this->Achievements->find()
                    ->where(['user_id' => $user_id])
                    ->first();
            $post->illust_num = $post->illust_num + 1;
        } else{
            $post = $this->Achievements->newEntity();
            $post = $this->Achievements->patchEntity($post,['illust_num' => 1, 'series_num' => 0, 'story_num' => 0, "user_id" => $user_id]);
        }
        $this->Achievements->save($post);
    }

    function getAchievementNum($user_id){
        $illusts_num = $this->Achievements->find()
                    ->select(['illust_num'])
                    ->where(['user_id' => $user_id])
                    ->first();
        return $illusts_num['illust_num'];
    }


    function illustFtp(){
	//TODO: SFTPに置き換えたため今後不要
        $count = new IllustsController();
        $user_id = $this->request->getData('user_id');
        $urlGenerate = $user_id.'_'.$count->contentCounter($user_id).'_';
        $fileName = $this->request->getData('file');
        
        //接続情報
        $ftp_server = SFTP_SERVER;
        $ftp_user = SFTP_USER;
        $ftp_pass = SFTP_PASSWORD;
        $local_img = TMP."img/".$urlGenerate.$fileName['name'];
        $remote_img = $urlGenerate.$fileName['name'];


	// 接続を確立する。接続に失敗したら終了する。
        $conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
	// ログインを試みる
	ftp_pasv($conn_id, true);
        if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
            echo "Connected as $ftp_user@$ftp_server\n";
            ftp_put($conn_id, $remote_img, $local_img, FTP_BINARY, false);
            if(file_exists($local_img)){ // 画像を削除する
                unlink($local_img);
            }
        } else {
            echo "Couldn't connect as $ftp_user\n";
        }

        // 接続を閉じる
        ftp_close($conn_id);
    }
}
