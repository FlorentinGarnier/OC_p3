<?php

namespace src\User\Model;

use app\AbstractModel;
use app\Database;

class UserModel extends AbstractModel
{


    private $firstname;

    private $lastname;

    private $email;

    private $password;

    private $createdAt;

    private $updatedAt;

    private $roles;

    public function __construct(Database $database)
    {
        parent::__construct($database);

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
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param UserModel $userModel
     * @return $this|bool
     */
    public function save(UserModel $userModel)
    {
        if (!$this->findUserByEmail($userModel->getEmail())) {
            $statement = $this->database->prepare(
                'INSERT INTO `user` 
SET email = ?, firstname = ?, lastname = ?, password = ?, createdAt =  NOW(), roles_id = 3');

            $statement->execute([
                $userModel->getEmail(),
                $userModel->getFirstname(),
                $userModel->getLastname(),
                $userModel->getPassword()
            ]);
            return $this;
        }
        return false;


    }

    public function findOne($id)
    {
        $statement = $this->database->prepare('
SELECT * FROM user AS u 
LEFT JOIN roles as r ON u.roles_id = r.id
WHERE u.id = ?
    ');


        if (!$statement->execute([$id])) {
            return false;
        }

        $result = $statement->fetchObject(__CLASS__, [new Database()]);

        return $result;

    }

    public function findUserByEmail($username)
    {
        $statement = $this->database->prepare('
SELECT u.id as id, u.password as password FROM `user` AS u 
LEFT JOIN roles as r ON u.roles_id = r.id
WHERE `email` = ?
    ');


        if (!$statement->execute([$username])) {
            return false;
        }

        $result = $statement->fetchObject(__CLASS__, [new Database()]);

        return $result;

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

}