<?php
namespace Site;

require_once 'helpers/data.php';
require_once 'helpers/connect.php';
require_once 'index_data.php';
require_once 'form.php';

use Site\Connect as Con;
use Site\Data as Data;
use Site\Index as Index;
use Site\Form as Form;

//nice little inteface for site content
interface SiteContent{
    public function _InitializeClass($con);
}

//here is where all the names are setted, and where all the magic happend 
class InitializeSite{
    protected static $data;
    protected static $con;
    protected static $classes;

    //$site_num is for checking whith site is opened
    public function __construct($site_num){
        self::_GetClasses($site_num);
        self::_GetReferences();
    }
    
    
    public function __destruct(){
        self::_LoadContent();
    }

    private function _GetClasses($site_num){
        //setting index content
        if($site_num == 1){
            $first = new Index\SiteData();
            $second = new Index\DeleteData();
            self::$classes = array($first, $second);
        }
        //setting form content
        else if($site_num == 2){
            $first = new Form\FormOptions();
            $second = new Form\FormData();
            self::$classes = array($first, $second);
        }
    }

    //defining variables to classes
    private function _GetReferences(){
        self::$con = new Con\Connection();
    }

    //loading all content
    private function _LoadContent(){
        foreach(self::$classes as $classes) {
            $classes->_InitializeClass(self::$con);
        }
    }
}
?>