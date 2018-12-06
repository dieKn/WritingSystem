<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Viewer extends Entity {
  protected $_accessible = [
    '*' => true
  ];
}

