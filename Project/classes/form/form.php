<?php
namespace Site\Form;

require_once '../helpers/data.php';
require_once '../helpers/validate.php';
require_once '../helpers/questions.php';
require_once '../interfaces/site_content.php';

class SendForm implements \Site\SiteContent\SiteContent{   
    use \Site\Data\Data;
    use \Site\Questions\Questions;
    
    //class initializing file, implemented from site.php, it also gets data in site.php
    public function _InitializeClass(){
        self::_SetAll();
        self::_FormData();
    }

    //in order: chenging if sku already exists, validating description of different types, defining data, showing error if something wrong, else sending data
    private function _FormData(){
        $skuF = $_POST["sku"];
        $check = self::_Check($this->getTableName(),
                                $this->getSKU(),
                                $skuF);
        if(mysqli_num_rows($check)!=0){
            echo "error";
            return false;
        }
        $nameF = $_POST["name"];
        $priceF = $_POST["price"];
        $typeF = $_POST["type"];
        $descF = $_POST["desc"];

        self::_SendData($this->getTableName(), 
                        $this->getSKU(), 
                        $this->getName(), 
                        $this->getPrice(), 
                        $this->getProductTypeID(),
                        $this->getDescription(), 
                        $skuF, 
                        $nameF, 
                        $priceF, 
                        $typeF, 
                        $descF);
    }
}
$class = new SendForm;
$class->_InitializeClass();
?>