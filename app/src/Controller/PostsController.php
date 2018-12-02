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
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class PostsController extends AppController
{
    public function index()
    {
        $test = new UsersController();
        $posts = $test->test();
	$this->set('teststr', $posts);
	$user = $this->Auth->user('id');
	$this->set('user_id', $user);
    }
    //投稿ページ用の関数
    public function storyAdd($post_id)
    {
        $test = new UsersController();
        $posts = $test->test();
        $this->set('teststr', $posts);
        $user = $this->Auth->user('id');
        $this->set('user_id', $user);
        $this->set(compact('post_id'));

        $url = Router::url('/', true); 
        $this->set(compact('url'));
    }
    //投稿ページ用の関数
    public function seriesAdd()
    {
        $test = new UsersController();
        $posts = $test->test();
        $this->set('teststr', $posts);
        $user = $this->Auth->user('id');
        $this->set('user_id', $user);

        $url = Router::url('/', true); 
        $this->set(compact('url'));
    }
    public function save()
    {
	$post = $this->Posts->newEntity();
        if($this->request->is('post')){
            $post = $this->Posts->patchEntity($post,$this->request->getData());
            $this->Posts->save($post); 
            return $this->redirect(['action'=>'index']);
        }
    }
    //投稿をセーブする関数
    public function seriesSave()
    {
	$series = TableRegistry::getTableLocator()->get('series');
	$post = $series->newEntity();
        if($this->request->is('post')){
            $post = $series->patchEntity($post,$this->request->getData());
            $series->save($post);
            return $this->redirect('/Users/mypage');
        }
    }

    //投稿をセーブする関数
    public function storySave()
    {
        $stories = TableRegistry::getTableLocator()->get('stories');
        $post = $stories->newEntity();
        if($this->request->is('post')){
            $post = $stories->patchEntity($post,$this->request->getData());
            $stories->save($post);
            return $this->redirect('/Users/mypage');
        }
    }

    //投稿の削除
    public function seriesDelete(){
        $series = TableRegistry::getTableLocator()->get('series');
        $post = $series->newEntity();
        if($this->request->is('post')){
            $entity = $series->get($this->request->getData());
            $series->delete($entity);
            return $this->redirect('/Users/mypage');
        }
    }

    //投稿の削除
    public function storyDelete(){
        $story = TableRegistry::getTableLocator()->get('stories');
        $post = $story->newEntity();
        if($this->request->is('post')){
            $entity = $story->get($this->request->getData());
            $story->delete($entity);
            return $this->redirect('/Users/mypage');
        }
    }
    //自分の投稿の一覧を取得する関数
    public function seriesList($post_id){ //ユーザのアクセス権限にバグあり
        $series = TableRegistry::getTableLocator()->get('series');
        $stories = TableRegistry::getTableLocator()->get('stories');
        $url = Router::url('/', true); 
        $this->set(compact('url'));
        $posts = $series->find()
        ->where(['series_id' => $post_id])
        ->contain(['Users']);
        $story_list = $stories->find()
        ->where(['series_id' => $post_id]);
        $this->set(compact('posts'));
        $this->set(compact('story_list'));
        $this->set(compact('post_id'));
        return;
    }

    //自分の投稿の一覧を取得する関数
    public function storySingle($series_id,$story_id){ //ユーザのアクセス権限にバグあり
        $story = TableRegistry::getTableLocator()->get('stories');
        $url = Router::url('/', true); 
        $this->set(compact('url'));
        $posts = $story->find()
        ->where(['story_id' => $story_id]) 
        ->contain(['Users','Series']) ;
        $this->set(compact('posts'));
        $this->set(compact('series_id'));
        $this->set(compact('story_id'));
        return;
    }
}
