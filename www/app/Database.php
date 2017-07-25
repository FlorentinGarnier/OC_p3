<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 01/07/2017
 * Time: 23:17
 */

namespace app;


use PDO;

/**
 * Class Database
 * @package app
 */
class Database
{
    private $link = null ;

    public function __construct()
    {
        if ( $this->link ) {
            return $this->link ;
        }

        $ini = __ROOT_DIR__ . "config/database.ini" ;
        $parse = parse_ini_file ( $ini , true ) ;

        $driver = $parse [ "db_driver" ] ;
        $dsn = "${driver}:" ;
        $user = $parse [ "db_user" ] ;
        $password = $parse [ "db_password" ] ;
        $options = $parse [ "db_options" ] ;
        $attributes = $parse [ "db_attributes" ] ;

        foreach ( $parse [ "dsn" ] as $k => $v ) {
            $dsn .= "${k}=${v};" ;
        }

        try {
            $this->link = new PDO ( $dsn, $user, $password, $options ) ;
        } catch (\Exception $exception)
        {
            die('Erreur : ' .$exception->getMessage());
        }


        foreach ( $attributes as $k => $v ) {
            $this->link -> setAttribute ( constant ( "PDO::{$k}" )
                , constant ( "PDO::{$v}" ) ) ;
        }
    }




    public function getLink() {
        

        return $this->link ;
    }


}