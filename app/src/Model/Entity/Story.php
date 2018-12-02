<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Story extends Entity {
  protected $_accessible = [
    '*' => true
  ];
  protected function _getStoryTitle($title)
    {
        return ucwords($title);
    }
}

