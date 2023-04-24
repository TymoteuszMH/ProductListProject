<?php
namespace Site\Form;

require_once 'helpers/validate.php';
require_once 'site.php';

use Site as S;
use Site\Validation as Val;

class FormOptions implements S\SiteContent
{   
    use S\Data\Data;
    //this consts are for making jquery script to show data in specific location on form
    const script_start = '<script> $("#productType").html("';
    const script_end = '");</script>';

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($con){
        $result = self::_Data(  $con, 
                                $this->getTypeTableName());
        self::_Options( $result, 
                        $this->getTitle(), 
                        $this->getTypeID());
    }

    //getting all tipes and showing them as options
    private function _Options($result, $title, $typeID){
        echo self::script_start;
        echo "<option value='' selected disabled hidden>Choose here</option>";
        while ($row = $result->fetch_assoc()) { 
            echo "<option id='".$row[$title]."' value='".$row[$typeID]."'>".$row[$title]."</option>";
        }
        echo self::script_end;
    }

    //getting types data
    private static function _Data($con, $table){
        $sql = "SELECT * FROM $table";
        return $con->_Action($sql);
    }
}

class FormData implements S\SiteContent
{
    use S\Data\Data;
    
    protected static $book;
    protected static $dvd;
    protected static $fur;

    //this consts are for making jquery script to show data in specific location on form and for moving user to index
    const err = "<script src='classes/js/error.js'></script>";
    const script = "<script src='classes/js/go_to_inx.js'></script>";

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($con){
        self::_GetReferences();
        self::_FormData($con);
    }

    //defining variables to classes
    private function _GetReferences(){
        self::$book = new Val\Book();
        self::$dvd = new Val\Dvd();
        self::$fur = new Val\Furniture();
    }
    
    //in order: chenging if sku already exists, validating description of different types, defining data, showing error if something wrong, else sending data
    private function _FormData($con){
        $err_count=0;
        if(isset($_POST['val'])){
            $check = self::_Check(  $con,
                                    $this->getTableName(),
                                    $this->getSKU(),
                                    $_POST["sku"]);
            if(mysqli_num_rows($check)!=0){
                $err_count++;
            }
            $descCont = [   '1' =>isset($_POST["desc"])? self::$dvd->_Validate($_POST["desc"]) : "",
                            '2' =>isset($_POST["desc"])? self::$book->_Validate($_POST["desc"]) : "",
                            '3' =>isset($_POST["height"]) ? self::$fur->_Validate([$_POST["height"], $_POST["width"], $_POST["length"]]): ""];
            $sku = $_POST["sku"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $typeID = $_POST["type"];
            $desc = $descCont[$typeID];

            if($err_count>0){
                echo self::err;
            }else{
                self::_SendData($con,
                                $this->getTableName(), 
                                $this->getSKU(), 
                                $this->getName(), 
                                $this->getPrice(), 
                                $this->getProductTypeID(),
                                $this->getDescription(), 
                                $sku, $name, $price, $typeID, $desc);
            }
        }
    }

    //checking if sku already exists
    private function _Check($con, $table, $sku, $skuF){
        $sql = "SELECT * FROM $table WHERE $sku='$skuF'";
        return $con->_Action($sql);
    }

    //sending correct data
    private function _SendData($con, $table, $sku, $name, $price, $typeid, $desc, $skuF, $nameF, $priceF, $typeIDF, $descF){
        $sql = "INSERT INTO $table ($sku, $name, $price, $typeid, $desc) VALUES ('$skuF','$nameF','$priceF','$typeIDF','$descF')";
        $con->_Action($sql); 
        echo self::script;
    }
}
?>