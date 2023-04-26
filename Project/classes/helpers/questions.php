<?php
namespace Site\Questions;

require_once '../helpers/connect.php';

trait Questions{
    //questions for sql
    use \Site\Connect\Connection;
    //getting data from view or producttype
    public function _GetData($table){
        $sql = "SELECT * FROM $table";
        return $this->_Action($sql);
    }
    //deleting element by id
    public function _DeleteElement($delateid, $table, $id){
        $sql = "DELETE FROM $table WHERE $id='$delateid'";
        $this->_Action($sql);
    }
    //checking if sku exists
    public function _Check($table, $sku, $skuF){
        $sql = "SELECT * FROM $table WHERE $sku='$skuF'";
        return $this->_Action($sql);
    }
    //sending data from post
    public function _SendData($table, $sku, $name, $price, $typeid, $desc, $skuF, $nameF, $priceF, $typeIDF, $descF){
        $sql = "INSERT INTO $table ($sku, $name, $price, $typeid, $desc) VALUES ('$skuF','$nameF','$priceF','$typeIDF','$descF')";
        $this->_Action($sql); 
    }
}
?>