<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

class AchievementsTable extends Table
{
  var $useTable = 'achievement';
  public function initialize(array $config)
  { 
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');
  }
}
