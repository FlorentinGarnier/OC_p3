<?php

namespace src\User\Model;

use app\AbstractModel;
use app\Database;

class UserModel extends AbstractModel
{

    private $id;

    private $firstname;

    private $lastname;

    private $email;

    private $password;

    private $createdAt;

    private $updatedAt;

    private $roles_id;


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

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getRolesId()
    {
        return $this->roles_id;
    }

    /**
     * @param mixed $roles_id
     */
    public function setRolesId($roles_id)
    {
        $this->roles_id = $roles_id;
    }

    public function getUserByUsername($username)
    {

        $statement = $this->database->prepare('SELECT * FROM `user` as u WHERE `email` = ?');

        if (!$statement->execute([$username])){
            return false;
        }

        $result = $statement->fetchObject(__CLASS__, [new Database()]);

        return $result;

    }

}