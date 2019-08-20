<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Panel Controller
 *
 *
 * @method \App\Model\Entity\Panel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PanelController extends AppController
{

    public function index()
    {

    }

    public function login()
    {

    }
    public function slider()
    {
        $top_slider_homepage = $this->loadModel('TopSliderHomepage');
        $top_slider_homepage = $top_slider_homepage->find();

        $this->set("top_slider_homepage", $top_slider_homepage);
    }
    public function upload()
    {
        $imageSentFromForm = $this->request->getData(['image_path']);
        $uploadPath = 'assets/top_slider_homepage/';
        if(!empty($imageSentFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $this->redirect('/panel/slider');
            }

        }
    }


}
