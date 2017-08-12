<?php

namespace src\Front\Model;

use app\AbstractModel;
use app\Database;

class CommentaryModel extends AbstractModel
{

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var int
     */
    private $billet_id;


    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @var string
     *
     * Title of commented article
     */
    private $title;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return BilletModel
     */
    public function getBillet()
    {
        return $this->billet;
    }

    /**
     * @param BilletModel $billet
     */
    public function setBillet($billet)
    {
        $this->billet = $billet;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    public function findAll($option = null)
    {
        $statement = $this->database->query("
SELECT c1.*, u.firstname AS firstname, u.lastname AS lastname, b.title AS title, u.id AS uid, b.id AS bid  FROM `commentary` AS c1 
LEFT JOIN `user` AS u ON c1.user_id = u.id
LEFT JOIN `billet` AS b ON c1.billet_id = b.id
");

        $data = [];

        while ($datum = $statement->fetchObject(__CLASS__, [new Database()])) {
            $data[] = $datum;
        }


        return $data;
    }

    public function findByArticleId($id)
    {
        $statement = $this->database->prepare("
        SELECT c.comment, c.id, c.user_id, c.billet_id, DATE_FORMAT(c.createdAt, '%e-%m-%Y à %T:%i') as createdAt, c.commentary_id, u.firstname, u.lastname 
        FROM `commentary` AS c 
        LEFT JOIN `user` as u ON c.user_id = u.id
        LEFT JOIN `commentary` as c2 ON c.commentary_id = c2.id
        WHERE c.billet_id = ?
        ");

        $statement->execute([$id]);

        $data = [];

        while ($datum = $statement->fetchObject(__CLASS__, [new Database()])) {
            $data[] = $datum;
        }

        return $data;
    }


    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getBilletId()
    {
        return $this->billet_id;
    }

    /**
     * @param int $billet_id
     * @return $this
     */
    public function setBilletId($billet_id)
    {
        $this->billet_id = $billet_id;
        return $this;
    }

    public function save(CommentaryModel $commentaryModel)
    {
        $statement = $this->database->prepare(
            '
INSERT INTO commentary
SET comment = ?, user_id = ?, billet_id = ?, createdAt =  NOW()
');

        $statement->execute([
            $commentaryModel->getComment(),
            $commentaryModel->getUserId(),
            $commentaryModel->getBilletId()
            ]);

        return true;

    }


}