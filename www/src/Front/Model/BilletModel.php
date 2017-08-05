<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 02/07/2017
 * Time: 14:48
 */

namespace src\Front\Model;


use app\AbstractModel;
use app\Database;

class BilletModel extends AbstractModel
{

    private $title;

    private $content;

    private $createdAt;

    private $updatedAt;

    private $category_id;

    private $user_id;


    public function save(BilletModel $billetModel)
    {
        if (!$billetModel->getId()){
            $statement = $this->database->prepare(
                '
INSERT INTO billet
SET title = ?, content = ?, createdAt =  NOW()
');

            $statement->execute([
                $billetModel->getTitle(),
                $billetModel->getContent(),

            ]);
        } else {
            $statement = $this->database->prepare("
            UPDATE billet SET title = ?, content = ?, updatedAt = NOW() WHERE id = ".  $billetModel->getId()
            );

            $statement->execute([
                $billetModel->getTitle(),
                $billetModel->getContent()
            ]);
        }
        return $this;


    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}