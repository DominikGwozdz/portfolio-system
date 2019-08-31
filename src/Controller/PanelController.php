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
class PanelController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('TopSliderHomepage');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $this->render('index');
    }

    // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- //
    // T O P S L I D E R H O M E P A G E
    public function slider()
    {
        $top_slider_homepage = $this->loadModel('TopSliderHomepage');
        $top_slider_homepage = $top_slider_homepage->find();

        $this->set("top_slider_homepage", $top_slider_homepage);
    }
    public function upload()
    {
        $imageSentFromForm = $this->request->getData(['image_path']);
        $titleFromForm = $this->request->getData('title');
        $descriptionFromForm = $this->request->getData('description');
        $isVisibleFromForm = $this->request->getData('is_visible');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }
        $uploadPath = 'assets/top_slider_homepage/';
        if(!empty($imageSentFromForm) && !empty($titleFromForm) && !empty($descriptionFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $saveInDb = $this->TopSliderHomepage->newEntity();
                $saveInDb->title = $titleFromForm;
                $saveInDb->description = $descriptionFromForm;
                $saveInDb->url = 'top_slider_homepage/' . $imageName;
                $saveInDb->is_visible = $isVisibleFromForm;
                if($this->TopSliderHomepage->save($saveInDb))
                {
                    $this->Flash->success(__('Zdjęcie zostało poprawnie załadowane!'));
                } else {
                    $this->Flash->error(__('Nie udało się wgrac zdjęcia!'));
                }


                $this->redirect('/panel/slider');
            }

        }
    }

    public function editSlider($id = null)
    {
        $top_slider_homepage = $this->loadModel('TopSliderHomepage');
        $top_slider_homepage = $top_slider_homepage->findById($id)->first();

        $this->set("top_slider_homepage", $top_slider_homepage);
        $this->render("edit_slider");

    }

    public function updateSlider($id = null)
    {
        $top_slider_homepage_table = TableRegistry::getTableLocator()->get('TopSliderHomepage');
        $slider_element = $top_slider_homepage_table->get($id);

        $titleFromForm = $this->request->getData('title');
        $descriptionFromForm = $this->request->getData('description');
        $isVisibleFromForm = $this->request->getData('is_visible');

        $slider_element->title = $titleFromForm;
        $slider_element->description = $descriptionFromForm;
        $slider_element->is_visible = $isVisibleFromForm;

        $top_slider_homepage_table->save($slider_element);

        $this->redirect('/panel/edit_slider/'. $id);
    }

    public function removeSlider($id = null) {
        $top_slider_homepage_table = TableRegistry::getTableLocator()->get('TopSliderHomepage');
        $slider_element = $top_slider_homepage_table->get($id);
        $top_slider_homepage_table->delete($slider_element);

        unlink(WWW_ROOT . '/assets/'. $slider_element->url);

        $this->Flash->success(__('Zdjęcie zostało poprawnie usunięte!'));

        $this->redirect('/panel/slider/');
    }

    // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- //
    // F A V O U R I T E F O O T E R
    public function favouritesFooter() {
        $favourites_footer = $this->loadModel('FavouritesFooter');
        $favourites_footer = $favourites_footer->find();

        $this->set("favourites_footer", $favourites_footer);
    }

    public function favouritesUpload() {
        $this->loadModel('FavouritesFooter');

        $imageSentFromForm = $this->request->getData(['image_path']);
        $isVisibleFromForm = $this->request->getData('is_visible');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }
        $uploadPath = 'assets/favourites_footer/';
        if(!empty($imageSentFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $saveInDb = $this->FavouritesFooter->newEntity();
                $saveInDb->url = 'favourites_footer/' . $imageName;
                $saveInDb->is_visible = $isVisibleFromForm;
                if($this->FavouritesFooter->save($saveInDb))
                {
                    $this->Flash->success(__('Zdjęcie zostało poprawnie załadowane!'));
                } else {
                    $this->Flash->error(__('Nie udało się wgrac zdjęcia!'));
                }


                $this->redirect('/panel/favourites_footer');
            }

        }
    }

    public function editFavouritesFooter($id = null)
    {
        $favourites_footer = $this->loadModel('FavouritesFooter');
        $favourites_footer = $favourites_footer->findById($id)->first();

        $this->set("favourites_footer", $favourites_footer);
        $this->render("edit_favourites_footer");

    }

    public function updateFavouritesFooter($id = null)
    {
        $favourites_footer_table = TableRegistry::getTableLocator()->get('FavouritesFooter');
        $single_element = $favourites_footer_table->get($id);

        $isVisibleFromForm = $this->request->getData('is_visible');
        $single_element->is_visible = $isVisibleFromForm;

        $favourites_footer_table->save($single_element);

        $this->Flash->success(__('Zdjęcie zostało poprawione!'));

        $this->redirect('/panel/edit_favourites_footer/'. $id);
    }

    public function removeFavouritesFooter($id = null) {
        $favourites_footer_table = TableRegistry::getTableLocator()->get('FavouritesFooter');
        $single_element = $favourites_footer_table->get($id);
        $favourites_footer_table->delete($single_element);

        unlink(WWW_ROOT . '/assets/'. $single_element->url);

        $this->Flash->success(__('Zdjęcie zostało poprawnie usunięte!'));

        $this->redirect('/panel/favourites_footer/');
    }

    // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- //
    // A B O U T M E
    public function about()
    {
        $about_me = $this->loadModel('AboutMe');
        $about_me = $about_me->findById(1)->first();

        $this->set("about_me", $about_me);

        $this->render('about');
    }

    public function editAbout()
    {
        $this->loadModel('AboutMe');
        $descriptionSentFromForm = $this->request->getData(['description']);
        $imageSentFromForm = $this->request->getData(['image_path']);
        $uploadPath = 'assets/about_me/';
        if(!empty($imageSentFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $about_me_table = TableRegistry::getTableLocator()->get('AboutMe');
                $single_element = $about_me_table->get(1);

                $single_element->photo = 'about_me/' . $imageName;
                $single_element->description = $descriptionSentFromForm;

                if($this->AboutMe->save($single_element))
                {
                    $this->Flash->success(__('Strona o mnie została zaktualizowana!'));
                } else {
                    $this->Flash->error(__('Wystąpił błąd!'));
                }

                $this->redirect('/panel/about/');
            }

        }
    }

    // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- //
    // C A T E G O R I E S G A L L E R Y
    public function categoriesGallery()
    {
        $categories_gallery = $this->loadModel('GalleryCategory');
        $categories_gallery = $categories_gallery->find();

        $this->set("categories_gallery", $categories_gallery);


        $this->render('categories_gallery');
    }

    public function editCategory($id = null)
    {
        $categories_gallery = $this->loadModel('GalleryCategory');
        $single_category = $categories_gallery->findById($id)->first();

        $this->set("single_category", $single_category);
        $this->render("edit_favourites_footer");

        $this->render('edit_category');
    }

    public function addNewCategory()
    {
        $this->loadModel('GalleryCategory');
        $imageSentFromForm = $this->request->getData('image_path');
        $titleFromForm = $this->request->getData('title');
        $isVisibleFromForm = $this->request->getData('is_visible');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }
        $uploadPath = 'assets/categories_gallery/';
        if(!empty($imageSentFromForm) && !empty($titleFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $saveInDb = $this->GalleryCategory->newEntity();
                $saveInDb->title = $titleFromForm;
                $saveInDb->url = 'categories_gallery/' . $imageName;
                $saveInDb->is_visible = $isVisibleFromForm;
                if($this->GalleryCategory->save($saveInDb))
                {
                    $this->Flash->success(__('Kategoria została dodana!'));
                } else {
                    $this->Flash->error(__('Nie udało się dodać kategorii!'));
                }

            }

        }

        $this->redirect('/panel/categories_gallery');
    }




}
