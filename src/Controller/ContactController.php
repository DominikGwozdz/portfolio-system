<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Contact Controller
 *
 *
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index()
    {
        $this->render('index');
    }

}
