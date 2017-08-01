<?php

namespace app;

use PDO;

abstract class AbstractModel
{

    protected $entity;
    protected $database;

    /**
     * AbstractModel constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database->getLink();
        $this->setEntity();
    }


    public function findAll()
    {

        $statement = $this->database->query("SELECT * FROM $this->entity");
        $data = $statement->fetchAll(PDO::FETCH_CLASS, get_class($this), [new Database()]);

        return $data;
    }

    public function findOne($id)
    {
        $statement =$this->database->prepare("SELECT * FROM $this->entity WHERE `id` = ?");
        $statement->execute([$id]);

        return $statement->fetchObject( get_class($this), [new Database()]);
    }

    private function setEntity()
    {
        $entity = explode('\\', get_class($this));
        $entity = strtolower(array_pop($entity));
        $entity = str_replace('model', '', $entity);

        $this->entity = $entity;
    }

}