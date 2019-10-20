<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Offer Controller
 *
 *
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OfferController extends AppController
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
