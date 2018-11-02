<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

class PostsTable extends Table
{
  var $useTable = 'posts';
  public function initialize(array $config)
  {	  
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');

  }
}
