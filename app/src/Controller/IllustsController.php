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
use App\Controller\PostsController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class IllustsController extends AppController
{
    public function initialize()
    { 
	//initialize関数をオーバーライドしているため認証なし
	$this->viewBuilder()->setLayout('write');
	
	//Postsテーブルを参照
	// $this->Posts = TableRegistry::get('posts');
	$this->Users = TableRegistry::get('users');
	$url = Router::url('/', true); 
	$this->set(compact('url'));
    }
    	
    public function content($post_id)
    {
	$posts = $this->Illusts->find()
	->where(['illust_id' => $post_id, 'content_status' => 'public'])
	->contain(['Users']);
	$this->set(compact('posts'));
	$this->set(compact('post_id'));
	$this->set(compact('story'));
	}

	public function contentCounter($user_id){
		$count = $this->Illusts->find()->where(['user_id' => $user_id])->count();
		return $count;
	}
	public function contentHistoryCounter($user_id){
		$count = $this->Illusts->find()->where(['user_id' => $user_id])->count();
		return $count;
	}
}
