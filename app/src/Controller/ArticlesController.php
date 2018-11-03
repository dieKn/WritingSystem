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
    }
    public function lists()
    {
	// $postObject = new PostsController();
	$posts = $this->Series->find()
	->where(['content_status' => 'public'])
	->contain(['Users']);
	$this->set(compact('posts'));
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
    }
}
