<?php
namespace Site\Index;

require_once 'site.php';

use Site as S;

class SiteData implements S\SiteContent{
    //this consts are for making jquery script to show data in specific location on index, and making card looks good
    const script_start = '<script> $("#data").html("';
    const card_div = "<div class='mb-3 col-lg-3 col-sm-6 col-md-4'><div class='card' style='width: 19rem;'>";
    const card_body_div = "<div class='card-body text-center'>";
    const script_end = '");</script>';

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($data, $con){
        $res = self::_Data(
            $con,
            $data); 
        self::_ShowData(
            $res, 
            $data::$gid, 
            $data::$gsku, 
            $data::$gname, 
            $data::$gprice, 
            $data::$gtitle, 
            $data::$gatribute, 
            $data::$gdesc);
    }
    
    //getting data for cards
    protected function _Data($con, $data){
        $sql = "SELECT * FROM ".$data::$glistview;
        return $con->_Action($sql);
    }

    //the name still speaks for itself
    protected function _ShowData($result, $id, $sku, $name, $price, $title, $atribute, $desc){
        echo self::script_start;
        while ($row = $result->fetch_assoc()) {
            echo self::card_div."<input type='checkbox' class='delete-checkbox form-check-input' name='checkbox[]' value='".$row[$id]."'>"
            .self::card_body_div
            .$row[$sku].
            "<br>".$row[$name].
            "<br>".$row[$price].
            "$<br>".$row[$title].
            "<br>".$row[$atribute].": ".$row[$desc].
            "</div></div></div>";
        }
        echo self::script_end;
    }
}

class DeleteData implements S\SiteContent
{
    //this consts are for making js script to move user to index.php
    const scr = "<script src='classes/js/go_to_inx.js'></script>";

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($data, $con){
        self::_Delete($data, $con);
    }

    //looking up all checkboxes and deleting data with id equal to checkbox value, specified in _ShowData above
    protected function _Delete($data, $con){
        if(isset($_POST['delete']))
        {
            if(isset($_POST["checkbox"])){
            $chk = $_POST["checkbox"];
            foreach ($chk as $delateid){
                self::_DeleteElement(   $con,
                                        $delateid, 
                                        $data::$gtable, 
                                        $data::$gid);
            }
            echo self::scr;
            }
        }
    }

    //deleting each element
    protected function _DeleteElement($con, $delateid, $table, $id){
        $sql = "DELETE FROM $table WHERE $id='$delateid'";
        $con->_Action($sql);
    }
}
?>