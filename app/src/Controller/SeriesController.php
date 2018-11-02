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

class SeriesController extends AppController
{

    public function save()
    {
	$post = $this->Series->newEntity();
	if($this->request->is('post')){
	  $post = $this->Series->patchEntity($post,$this->request->getData());
	  $this->Series->save($post); 
	  return $this->redirect('/Users/mypage');
	}
    }
}
