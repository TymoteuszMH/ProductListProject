<?php
namespace Site\Index;

require_once 'site.php';
require_once 'helpers/data.php';

use Site as S;

class SiteData implements S\SiteContent{

    use S\Data\Data;

    const script_start = '<script>$("#data").html("';
    const script_end = '");</script>';

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($con){
        $res = self::_Data(
            $con,
            $this->getListView()); 
        self::_ShowData(
            $res, 
            $this->getId(),
            $this->getSKU(),
            $this->getName(),
            $this->getPrice(),
            $this->getTitle(),
            $this->getAtribute(),
            $this->getDescription());
    }
    
    //getting data for cards
    protected function _Data($con, $view){
        $sql = "SELECT * FROM $view";
        return $con->_Action($sql);
    }

    //the name still speaks for itself
    protected function _ShowData($result, $id, $sku, $name, $price, $title, $atribute, $desc){
        echo self::script_start;
        while ($row = $result->fetch_assoc()) {
            echo $this->_CreateCard($row[$id], $row[$sku], $row[$name], $row[$price], $row[$title], $row[$atribute], $row[$desc]);
        }
        echo self::script_end;
    }

    private function _CreateCard($id, $sku, $name, $price, $title, $atribute, $desc){
        return 
        "<div class='mb-3 col-lg-3 col-sm-6 col-md-4'><div class='card' style='width: 19rem;'>".
            "<input type='checkbox' class='delete-checkbox form-check-input' name='checkbox[]' value='$id'>".
                "<div class='card-body text-center'>".
                    "$sku <br>".
                    "$name <br>".
                    "Price: $price <br>".
                    "$title <br>".
                    "$atribute : $desc".
                "</div>".
            "</div>".
        "</div>";
    }
}

class DeleteData implements S\SiteContent
{
    use S\Data\Data;
    //this consts are for making js script to move user to index.php
    const scr = "<script src='classes/js/go_to_inx.js'></script>";

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass($con){
        self::_Delete($con);
    }

    //looking up all checkboxes and deleting data with id equal to checkbox value, specified in _ShowData above
    protected function _Delete($con){
        if(isset($_POST['delete']))
        {
            if(isset($_POST["checkbox"])){
            $chk = $_POST["checkbox"];
            foreach ($chk as $delateid){
                self::_DeleteElement(   $con,
                                        $delateid, 
                                        $this->getTableName(), 
                                        $this->getId());
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