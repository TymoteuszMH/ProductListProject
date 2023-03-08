<?php
namespace Site\Validation;

abstract class Validate{
    //removing white spaces from data
    protected function _ValAll($data){
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);
        return $data;
    }
    //abstract class for all validate functions
    abstract public function _Validate($data);
}

class Book extends Validate
{
    //validating book's weight 
    public function _Validate($data)
    {
        $data = $this->_ValAll($data);
        $data = $data."kg";
        return $data;
    }
}
class Dvd extends Validate
{
    //validating dvd's weight 
    public function _Validate($data)
    { 
        $data = $this->_ValAll($data);
        $data = $data."MB";
        return $data;
    }
}
class Furniture extends Validate
{
    //validating furniture's dimensions  
    public function _Validate($data)
    {
        $h = $this->_ValAll($data[0]);
        $w = $this->_ValAll($data[1]);
        $l = $this->_ValAll($data[2]);
        $data = $h."cm/".$w."cm/".$l."cm";
        return $data;  
    }
}
?>