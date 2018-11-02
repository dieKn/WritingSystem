<?php
  namespace App\Model\Table;

  use Cake\ORM\Table;

  class SeriesTable extends Table
{
  var $useTable = 'series';
  public function initialize(array $config)
  { 
    $this->addBehavior('Timestamp');
    $this->belongsTo('Users');
    $this->hasMany('Stories');
  }
}
