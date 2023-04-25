<?php
namespace Site\Data;

//setters and getters for sql names 
trait Data{
    private $tablename;
    private $typetablename;
    private $listview;
    private $id;
    private $sku;
    private $name;
    private $price;
    private $producttypeid;
    private $description;
    private $typeid;
    private $title;
    private $atribute;

    public function setTableName($tablename){
        $this->tablename = $tablename;
    }

    public function getTableName(){
        return $this->tablename;
    }

    public function setTypeTableName($typetablename){
        $this->typetablename = $typetablename;
    }

    public function getTypeTableName(){
        return $this->typetablename;
    }

    public function setID($id){
        $this->id = $id;
    }

    public function getID(){
        return $this->id;
    }
    public function setSKU($sku){
        $this->sku = $sku;
    }

    public function getSKU(){
        return $this->sku;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setAtribute($atribute){
        $this->atribute = $atribute;
    }

    public function getAtribute(){
        return $this->atribute;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setProductTypeID($producttypeid){
        $this->producttypeid = $producttypeid;
    }

    public function getProductTypeID()
    {
        return $this->producttypeid;
    }

    public function setTypeID($typeid){
        $this->typeid = $typeid;
    }

    public function getTypeID(){
        return $this->typeid;
    }
    public function setListView($listview){
        $this->listview = $listview;
    }

    public function getListView(){
        return $this->listview;
    }

    public function _SetAll(){
        $this->setTableName('product');
        $this->setTypeTableName('producttype');
        $this->setListView('list');
        $this->setID('ID');
        $this->setSKU('SKU');
        $this->setName('Name');
        $this->setPrice('PRICE');
        $this->setTitle('Title');
        $this->setAtribute('Atribute');
        $this->setDescription('Description');
        $this->setTypeID('IDType');
        $this->setProductTypeID('TypeID');
    } 
}
?>