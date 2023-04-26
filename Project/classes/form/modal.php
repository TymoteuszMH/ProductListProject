<?php
namespace Site\Form;

require_once '../helpers/data.php';
require_once '../helpers/questions.php';
require_once '../interfaces/site_content.php';

class Modal implements \Site\SiteContent\SiteContent{   
    //using getters and setters from Data and getting data from Questions
    use \Site\Data\Data;
    use \Site\Questions\Questions;
    
    //class initializing file, implemented from site_content.php
    public function _InitializeClass(){
        self::_SetAll();
        $result = self::_GetData($this->getTypeTableName());
        self::_Options( $result, 
                        $this->getTitle(), 
                        $this->getTypeID());
    }

    //getting all types and showing them as options
    private function _Options($result, $title, $typeID){
        echo "<option value='' selected disabled hidden>Choose here</option>";
        while ($row = $result->fetch_assoc()) { 
            echo "<option id='".$row[$title]."' value='".$row[$typeID]."'>".$row[$title]."</option>";
        }
    }
}
//initializing file
$class = new Modal;
$class->_InitializeClass();
?>