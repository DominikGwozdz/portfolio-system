<?php
// src/Model/Entity/TopSliderHomepage.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class TopSliderHomepage extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
