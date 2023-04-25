<?php
namespace Site\Index;

require_once '../helpers/data.php';
require_once '../helpers/questions.php';
require_once '../interfaces/site_content.php';

class DeleteData implements \Site\SiteContent\SiteContent{
    use \Site\Data\Data;
    use \Site\Questions\Questions;

    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass(){
        self::_SetAll();
        self::_Delete();
    }

    //looking up all checkboxes and deleting data with id equal to checkbox value, specified in _ShowData above
    protected function _Delete(){
        $chk = $_POST["checkbox"];
        foreach ($chk as $delateid){
            self::_DeleteElement(   $delateid, 
                                    $this->getTableName(), 
                                    $this->getId());
        }
    }
}

$class = new DeleteData;
$class->_InitializeClass();
?>