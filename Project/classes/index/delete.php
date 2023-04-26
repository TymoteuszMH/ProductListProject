<?php
namespace Site\Index;

require_once '../helpers/data.php';
require_once '../helpers/questions.php';
require_once '../interfaces/site_content.php';

class DeleteData implements \Site\SiteContent\SiteContent{
    //using getters and setters from Data and getting data from Questions
    use \Site\Data\Data;
    use \Site\Questions\Questions;

    //class initializing file, implemented from site_content.php
    public function _InitializeClass(){
        self::_SetAll();
        self::_Delete();
    }

    //getting ids for delete from index.js and deleting them
    protected function _Delete(){
        $chk = $_POST["checkbox"];
        foreach ($chk as $delateid){
            self::_DeleteElement(   $delateid, 
                                    $this->getTableName(), 
                                    $this->getId());
        }
    }
}
//initializing file
$class = new DeleteData;
$class->_InitializeClass();
?>