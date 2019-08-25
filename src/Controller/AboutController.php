<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Panel Controller
 *
 *
 * @method \App\Model\Entity\Panel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('AboutMe');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $about_me = $this->loadModel('AboutMe');
        $about_me = $about_me->findById(1)->first();

        $this->set("about_me", $about_me);

        $this->render('index');
    }




}
