<?php
namespace Site\Questions;

require_once '../helpers/connect.php';

trait Questions{
    use \Site\Connect\Connection;

    public function _GetData($view){
        $sql = "SELECT * FROM $view";
        return $this->_Action($sql);
    }

    public function _DeleteElement($delateid, $table, $id){
        $sql = "DELETE FROM $table WHERE $id='$delateid'";
        $this->_Action($sql);
    }

    public function _Check($table, $sku, $skuF){
        $sql = "SELECT * FROM $table WHERE $sku='$skuF'";
        return $this->_Action($sql);
    }

    public function _SendData($table, $sku, $name, $price, $typeid, $desc, $skuF, $nameF, $priceF, $typeIDF, $descF){
        $sql = "INSERT INTO $table ($sku, $name, $price, $typeid, $desc) VALUES ('$skuF','$nameF','$priceF','$typeIDF','$descF')";
        $this->_Action($sql); 
    }
}
?>