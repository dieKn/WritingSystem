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

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

//        $this->loadComponent('RequestHandler');
	$this->loadComponent('Flash');
	$this->loadComponent('Auth', [
		'authorize' => ['Controller'],
		'authenticate' => [
			'Form' => [
				'fields' => [
					'username' => 'username',
					'password' => 'password'
				]
			]
		],
		'loginRedirect' => [
			'controller' => 'Users',
			'action' => 'mypage'
		],
		'logoutRedirect' => [
			'controller' => 'Users',
			'action' => 'login',
		],
		'authError' => 'ログインしてください',
	]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    /*isAuthorized関数をオーバーライド*/
    public function isAuthorized($user)
    {
	    return true;
    }

    public function login()
    {
	    if($this->request->isPost()){
		    $user = $this->Auth->identify();
		    if(!empty($user)){
			    $this->Auth->setUser($user);
			    return $this->redirect($this->Auth->redirectUrl());
		    }
		    $this->Flash->error('ユーザ名もしくはパスが間違っている');
	    }
    }

}
