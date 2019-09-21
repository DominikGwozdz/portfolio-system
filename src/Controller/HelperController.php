<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Helper Controller
 *
 * Add your helper methods to get any data in any controller without duplicate code
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class HelperController extends AppController
{

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

    }

    public static function getCategoryNameById($id = null)
    {
        $model = new HelperController();
        $gallery_category = $model->loadModel('GalleryCategory');
        $gallery_category = $gallery_category->findById($id)->first();

        return $gallery_category->name;
    }
}
