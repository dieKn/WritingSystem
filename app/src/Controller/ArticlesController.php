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

class ArticlesController extends AppController
{

	public $paginate = [
		'limit' => 1
		];
    public function initialize()
    { 
	//initialize関数をオーバーライドしているため認証なし
	$this->viewBuilder()->setLayout('write');
	$this->loadComponent('Paginator');
	
	//Postsテーブルを参照
	// $this->Posts = TableRegistry::get('posts');
	$this->Series = TableRegistry::get('series');
	$this->Stories = TableRegistry::get('stories');
	$this->Users = TableRegistry::get('users');
	$this->Viewers = TableRegistry::get('viewers');
	$url = Router::url('/', true); 
	$this->set(compact('url'));
    }
    public function lists()
    {
	$this->Illusts = TableRegistry::get('illusts');
	$posts = $this->Series->find()
	->where(['content_status' => 'public'])
	->contain(['Users']);
	$this->set(compact('posts'));
	
	//一覧ページのイラスト
	$illusts_posts = $this->Illusts->find()
	->where(['content_status' => 'public'])
	->contain(['Users']);
	$this->set(compact('illusts_posts'));

	$test = Router::url('/', true); 
	$this->set(compact('test'));
	}
	
    public function content($post_id)
    {
	$posts = $this->Series->find()
	->where(['series_id' => $post_id, 'content_status' => 'public'])
	->contain(['Users']);
	$this->set(compact('posts'));
	$this->set(compact('post_id'));
	$story = $this->Stories->find()
	->where(['series_id' => $post_id, 'content_status' => 'public']);
	$this->set(compact('story'));
	$this->viewCounter(null, $post_id);
	}
	
	public function page($post_id, $story_id=null)
    {
	// $story = $this->Stories->find()
	// ->where(['story_id' => $story_id, 'content_status' => 'public']);
	$story = $this->paginate($this->Stories->find()->where(['series_id' => $post_id, 'content_status' => 'public']));
	$this->set(compact('storyData'));
	$this->set(compact('story'));
	$this->set(compact('post_id'));
	$this->set(compact('story_id'));

	$ranking_series = $this->getRanking();
	$this->set(compact('ranking_series'));
	$genre = $this->Series->get($post_id)->genre;
	$relation_series = $this->getRelation($genre);
	$this->set(compact('relation_series'));
	$this->viewCounter($story_id, $post_id);	
	}
	
	function getRelation($genre){
		$posts = $this->Series->find()
		->where(['genre' => $genre, 'content_status' => 'public'])
		->contain(['Users'])
		->limit(5);
		return $posts;
	}

	function getRanking(){
		$rank = $this->Viewers->find()
		->contain(['Series'])
		->limit(5)
		->order(['view_count' => 'DESC']);
		return $rank;
	}

	function viewCounter($story_id=null, $series_id=null){
		$getView = $this->Viewers->exists(['OR' => ['series_id' => $series_id, 'story_id' => $story_id]]);
		if($getView){ //すでに閲覧されているか判定
			$post = $this->Viewers->find()
					->where(['OR' => ['series_id' => $series_id, 'story_id' => $story_id]])
					->first();
			$post->view_count = $post->view_count + 1;
		} else{
			$post = $this->Viewers->newEntity();
			$post = $this->Viewers->patchEntity($post,['series_id' => $series_id, 'story_id' => $story_id, "view_count" => 1]);
		}
		$test = $this->Viewers->save($post);
	}
}
