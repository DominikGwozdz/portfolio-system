<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
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
            } else {
                $this->Flash->error(__("Niestety nie udało się wgrać zdjęcia! Rozmiar obrazka jest za duży!"));
                $this->redirect('/panel/slider');
            }

        } else {
            $this->Flash->error(__("Musisz wpisać tytuł i opis obrazka!"));
            $this->redirect("/panel/slider");
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

        $folder_slider_element = new File(WWW_ROOT . '/assets/'. $slider_element->url);
        $folder_slider_element->delete();

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

        $folder_favourite_footer = new File(WWW_ROOT . '/assets/'. $single_element->url);
        $folder_favourite_footer->delete();

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

        $about_me_table = TableRegistry::getTableLocator()->get('AboutMe');
        $single_element = $about_me_table->get(1);

        if(!empty($descriptionSentFromForm))
        {
            $single_element->description = $descriptionSentFromForm;
        }
        if(!empty($imageSentFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $single_element->photo = 'about_me/' . $imageName;
            }
        }

        if($this->AboutMe->save($single_element))
        {
            $this->Flash->success(__('Strona o mnie została zaktualizowana!'));
        } else {
            $this->Flash->error(__('Wystąpił błąd!'));
        }

        $this->redirect('/panel/about/');
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
        $nameFromForm = $this->request->getData('name');
        $isVisibleFromForm = $this->request->getData('is_visible');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }
        $uploadPath = 'assets/categories_gallery/';
        if(!empty($imageSentFromForm['name']) && !empty($nameFromForm)) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $uploadPath.$imageName;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage))
            {
                $saveInDb = $this->GalleryCategory->newEntity();
                $saveInDb->name = $nameFromForm;
                $saveInDb->url = 'categories_gallery/' . $imageName;
                $saveInDb->is_visible = $isVisibleFromForm;
                if($this->GalleryCategory->save($saveInDb))
                {
                    $this->Flash->success(__('Kategoria została dodana!'));
                } else {
                    $this->Flash->error(__('Nie udało się dodać kategorii!'));
                }

            }

        } else {
            $this->Flash->error(__('Nie udało się dodać kategorii z powodu braku nazwy lub zdjęcia!'));
        }

        $this->redirect('/panel/categories_gallery');
    }

    public function editExistingCategory($id = null)
    {
        $this->loadModel('GalleryCategory');
        $categories_gallery_table = TableRegistry::getTableLocator()->get('GalleryCategory');
        $category_element = $categories_gallery_table->get($id);

        $nameFromForm = $this->request->getData('name');
        $isVisibleFromForm = $this->request->getData('is_visible');

        $category_element->name = $nameFromForm;
        $category_element->is_visible = $isVisibleFromForm;

        $categories_gallery_table->save($category_element);

        $this->redirect('/panel/categories_gallery');
    }

    public function removeExistingCategory($id = null) {
        $categories_gallery_table = TableRegistry::getTableLocator()->get('GalleryCategory');
        $category_element = $categories_gallery_table->get($id);
        $categories_gallery_table->delete($category_element);

        $folder_category_gallery = new File(WWW_ROOT . '/assets/'. $category_element->url);
        $folder_category_gallery->delete();


        $this->Flash->success(__('Kategoria została poprawnie usunięta!'));

        $this->redirect('/panel/categories_gallery');
    }

    // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- // // --- // -- // -- // -- // -- //
    // G A L L E R I E S
    public function galleries()
    {
        $galleries = $this->loadModel('Gallery');
        $categories_gallery = $this->loadModel('GalleryCategory');

        $categories_gallery = $categories_gallery->find();
        $galleries = $galleries->find();

        $cat_array = [];
        foreach ($categories_gallery as $category) {
            array_push($cat_array,['value' => $category->id, 'text' => $category->name]);
        }
        $this->set("categories_gallery", $cat_array);
        $this->set("galleries", $galleries);

        $this->render('galleries');
    }

    public function addNewGallery()
    {
        $this->loadModel('Gallery');
        $nameFromForm = $this->request->getData('name');
        $imageSentFromForm = $this->request->getData('image_path');
        $isVisibleFromForm = $this->request->getData('is_visible');
        $categoryIdFromForm = $this->request->getData('category');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }

        if(!empty($nameFromForm)) {
            $saveInDb = $this->Gallery->newEntity();
            $saveInDb->name = $nameFromForm;

            //always generate random chars (by generating timestamp which every second is unique and hash it with md5)
            $hashed_directory_name = md5(time());
            $saveInDb->directory = 'gallery/' . $hashed_directory_name . '/';

            $directory_of_gallery = WWW_ROOT . 'assets/gallery/' . $hashed_directory_name;
            if(!file_exists($directory_of_gallery)) {
                $folder = new Folder($directory_of_gallery, true, 0755);
            }

            if(!empty($imageSentFromForm['name']))
            {
                $uploadPath = 'gallery/' . $hashed_directory_name . '/';
                $imageName = $imageSentFromForm['name'];
                $imageName = str_replace(" ", "_", $imageName);
                $imageName = strtolower($imageName);

                $pathToUploadedImage = $uploadPath.$imageName;
                $pathToUploadedImage_pyshicaly = WWW_ROOT . '/assets/' . $pathToUploadedImage;
                if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage_pyshicaly)) {
                    $saveInDb->picture = $pathToUploadedImage;
                }
            }

            $saveInDb->is_visible = $isVisibleFromForm;
            $saveInDb->category_id = $categoryIdFromForm;
            if($this->Gallery->save($saveInDb))
            {
                $this->Flash->success(__('Galeria została dodana!'));
            } else {
                $this->Flash->error(__('Nie udało się dodać galerii!'));
            }

        } else {
            $this->Flash->error(__('Nie udało się dodać galerii z powodu braku nazwy!'));
        }

        $this->redirect('/panel/galleries');
    }

    public function editGallery($id = null)
    {
        $gallery = $this->loadModel('Gallery');
        $single_gallery = $gallery->findById($id)->first();
        $this->set("single_gallery", $single_gallery);

        $categories_gallery = $this->loadModel('GalleryCategory');
        $categories_gallery = $categories_gallery->find();
        $cat_array = [];
        foreach ($categories_gallery as $category) {
            array_push($cat_array,['value' => $category->id, 'text' => $category->name]);
        }
        $this->set("categories_gallery", $cat_array);

        $gallery_item = $this->loadModel('GalleryItem');
        $gallery_items = $gallery_item->findByGalleryId($id);
        $this->set("gallery_items", $gallery_items);

        $this->render('edit_gallery');
    }

    public function updateGallery($id = null)
    {
        $gallery = $this->loadModel('Gallery');
        $single_gallery = $gallery->findById($id)->first();
        $this->set("single_gallery", $single_gallery);

        $gallery_item = $this->loadModel('GalleryItem');
        $gallery_items = $gallery_item->findByGalleryId($id);
        $this->set("gallery_items", $gallery_items);

        $imageSentFromForm = $this->request->getData(['image_path']);
        $gallery_table = TableRegistry::getTableLocator()->get('Gallery');
        $existing_gallery = $gallery_table->get($id);


        if(!empty($imageSentFromForm['name'])) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $existing_gallery->directory.$imageName;
            $pathToUploadedImage_physicaly = 'assets/' . $pathToUploadedImage;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage_physicaly))
            {
                $gallery_item_table = $this->GalleryItem->newEntity();
                $gallery_item_table->url = $pathToUploadedImage;
                $gallery_item_table->is_highlighted = 0;
                $gallery_item_table->gallery_id = $existing_gallery->id;

                if($this->GalleryItem->save($gallery_item_table))
                {
                    $this->Flash->success(__('Dodano zdjęcie do galerii!'));
                } else {
                    $this->Flash->error(__('Wystąpił błąd przy dodawaniu zdjęcia!'));
                }

            }

        } else {
            $this->Flash->error(__('Wybierz zdjęcie!'));
        }

        $this->redirect('/panel/edit_gallery/' . $id);
    }

    public function editGalleryLabel($id = null)
    {
        $gallery = $this->loadModel('Gallery');
        $gallery = $gallery->findById($id)->first();
        $this->set("gallery", $gallery);

        $this->render('edit_gallery_label');
    }

    public function editGalleryData($id = null)
    {
        $this->loadModel('Gallery');
        $gallery_table = TableRegistry::getTableLocator()->get('Gallery');
        $existing_gallery = $gallery_table->get($id);

        $nameFromForm = $this->request->getData('name');
        $isVisibleFromForm = $this->request->getData('is_visible');
        if(empty($isVisibleFromForm)) {
            $isVisibleFromForm = '0';
        }
        $categoryIdFromForm = $this->request->getData('category');

        $existing_gallery->name = $nameFromForm;
        $existing_gallery->is_visible = $isVisibleFromForm;
        $existing_gallery->category_id = $categoryIdFromForm;


        if($gallery_table->save($existing_gallery))
        {
            $this->Flash->success(__('Zapisano zmiany!'));
        } else {
            $this->Flash->error(__('Wystąpił błąd przy zapisywaniu zmian!'));
        }
        $this->redirect('/panel/edit_gallery/' . $id);
    }

    public function updateGalleryLabel($id = null)
    {
        $this->loadModel('Gallery');

        $gallery_table = TableRegistry::getTableLocator()->get('Gallery');
        $existing_gallery = $gallery_table->get($id);

        $imageSentFromForm = $this->request->getData(['image_path']);
        if(!empty($imageSentFromForm['name'])) {
            $imageName = $imageSentFromForm['name'];
            $imageName = str_replace(" ", "_", $imageName);
            $imageName = strtolower($imageName);

            $pathToUploadedImage = $existing_gallery->directory.$imageName;
            $pathToUploadedImage_physicaly = 'assets/' . $pathToUploadedImage;
            if (move_uploaded_file($imageSentFromForm['tmp_name'],$pathToUploadedImage_physicaly))
            {
                $existing_gallery->picture = $pathToUploadedImage;
                $gallery_table->save($existing_gallery);

                $this->Flash->success(__('Dodano zdjęcie do galerii!'));
            } else {
                $this->Flash->error(__('Wystąpił błąd przy dodawaniu zdjęcia!'));
            }

        } else {
            $this->Flash->error(__('Nie wybrano zdjęcia!'));
        }

        $this->redirect('/panel/edit_gallery_label/' . $id);
    }

    public function removeExistingGallery($id = null)
    {
        $gallery = $this->loadModel('Gallery');
        $gallery_item = $this->loadModel('GalleryItem');

        $gallery_table = TableRegistry::getTableLocator()->get('Gallery');
        $gallery = $gallery_table->get($id);

        $gallery_item = $gallery_item->findByGalleryId($gallery->id);
        foreach($gallery_item as $item)
        {
            $folder_gallery_item = new Folder(WWW_ROOT . 'assets/' . $item->url);
            $folder_gallery_item->delete();
        }

        $folder_gallery = new Folder(WWW_ROOT . 'assets/' . $gallery->directory);
        $folder_gallery->delete();

        $gallery_item_table = TableRegistry::getTableLocator()->get('GalleryItem');
        $gallery_item_table->deleteAll(array('GalleryItem.gallery_id' => $gallery->id));
        $gallery_table->delete($gallery);

        $this->Flash->success(__('Galeria została usunięta poprawnie!'));

        $this->redirect('/panel/galleries/');
    }

    public function editGalleryItem($id = null)
    {
        $gallery_item = $this->loadModel('GalleryItem');
        $gallery_item = $gallery_item->findById($id)->first();

        $this->set("gallery_item", $gallery_item);
        $this->render('edit_gallery_item');
    }

    public function editGalleryItemDelete($id = null)
    {
        $gallery_item = $this->loadModel('GalleryItem');
        $gallery_item = $gallery_item->findById($id)->first();

        $file_gallery_item = new File(WWW_ROOT . 'assets/'. $gallery_item->url);
        $file_gallery_item->delete();

        $gallery_item_table = TableRegistry::getTableLocator()->get('GalleryItem');
        $gallery_item_table->deleteAll(array('GalleryItem.id' => $id));

        $this->redirect('/panel/galleries');
    }
}
