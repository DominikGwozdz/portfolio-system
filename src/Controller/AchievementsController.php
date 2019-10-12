<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * About Controller
 *
 *
 * @method \App\Model\Entity\Achievements[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AchievementsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function index()
    {
        $this->render('index');
    }




}
