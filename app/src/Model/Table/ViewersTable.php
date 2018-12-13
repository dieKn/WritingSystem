<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

class ViewersTable extends Table
{
  var $useTable = 'viewer';
  public function initialize(array $config)
  { 
    $this->addBehavior('Timestamp');
    $this->belongsTo('Series');
  }
}
