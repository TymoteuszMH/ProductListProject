<?php
namespace Site\Index;

require_once '../helpers/data.php';
require_once '../helpers/questions.php';
require_once '../interfaces/site_content.php';


class SiteData implements \Site\SiteContent\SiteContent{
    //using getters and setters from Data and getting data from Questions
    use \Site\Data\Data;
    use \Site\Questions\Questions;

    //class initializing file, implemented from site_content.php
    public function _InitializeClass(){
        self::_SetAll();
        $res = self::_GetData($this->getListView()); 
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
    
    //sending getted data to create card and showing it
    protected function _ShowData($result, $id, $sku, $name, $price, $title, $atribute, $desc){
        while ($row = $result->fetch_assoc()) {
            echo $this->_CreateCard($row[$id], $row[$sku], $row[$name], $row[$price], $row[$title], $row[$atribute], $row[$desc]);
        }
    }
    //creating card
    private function _CreateCard($id, $sku, $name, $price, $title, $atribute, $desc){
        return 
        "<div class='mb-3 col-lg-3 col-sm-6 col-md-4'><div class='card' style='width: 19rem;'>".
            "<input type='checkbox' class='delete-checkbox form-check-input' name='checkbox[]' value='$id' id='delete-element'>".
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
//initializing file
$class = new SiteData;
$class->_InitializeClass();
?>