<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

class IllustsTable extends Table
{
  var $useTable = 'Illut';
  public function initialize(array $config)
  { 
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');
  }
}
