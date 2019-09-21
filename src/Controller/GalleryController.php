<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Gallery Controller
 *
 *
 * @method \App\Model\Entity\Gallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleryController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index()
    {
        $gallery_category = $this->loadModel('GalleryCategory');
        $gallery_category = $gallery_category->find();

        $this->set("gallery_category", $gallery_category);

        $this->render('index');
    }

    public function show($id = null)
    {
        //send info about category name to view
        $gallery_category = $this->loadModel('GalleryCategory');
        $gallery_category = $gallery_category->findById($id)->first();
        $this->set("gallery_category", $gallery_category);

        $galleries = $this->loadModel('Gallery');
        $galleries = $galleries->findByCategoryId($id);
        $this->set("galleries", $galleries);

        $this->render('show');
    }

    public function items($id = null)
    {
        $gallery_items = $this->loadModel('GalleryItem');
        $gallery_items = $gallery_items->findByGalleryId($id);
        $this->set("gallery_items", $gallery_items);

        $gallery = $this->loadModel('Gallery');
        $gallery = $gallery->findById($id)->first();
        $this->set("gallery", $gallery);

        $this->render('items');
    }

}
