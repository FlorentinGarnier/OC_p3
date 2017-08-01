<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 08/07/2017
 * Time: 16:39
 */

namespace src\Admin\Controller;


use app\AbstractController;

class AdminController extends AbstractController
{
    public function indexAction()
    {

        return $this->render(':index');
    }



}