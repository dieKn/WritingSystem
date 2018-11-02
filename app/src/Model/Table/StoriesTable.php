<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

class StoriesTable extends Table
{
  var $useTable = 'story';
  public function initialize(array $config)
  { 
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');
    $this->belongsTo('Series');
  }
}
