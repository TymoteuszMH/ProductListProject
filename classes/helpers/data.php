<?php
namespace Site\Data;

//setters and getters for sql names 
trait SetData
{
    private $tablename;
    private $typetablename;
    private $id;
    private $sku;
    private $name;
    private $price;
    private $producttypeid;
    private $description;
    private $typeid;
    private $title;
    private $atribute;

    protected function setTableName($tablename)
    {
        $this->tablename = $tablename;
    }

    protected function getTableName()
    {
        return $this->tablename;
    }

    protected function setTypeTableName($typetablename)
    {
        $this->typetablename = $typetablename;
    }

    protected function getTypeTableName()
    {
        return $this->typetablename;
    }

    protected function setID($id)
    {
        $this->id = $id;
    }

    protected function getID()
    {
        return $this->id;
    }
    protected function setSKU($sku)
    {
        $this->sku = $sku;
    }

    protected function getSKU()
    {
        return $this->sku;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    protected function getName()
    {
        return $this->name;
    }

    protected function setPrice($price)
    {
        $this->price = $price;
    }

    protected function getPrice()
    {
        return $this->price;
    }

    protected function setTitle($title)
    {
        $this->title = $title;
    }

    protected function getTitle()
    {
        return $this->title;
    }
    protected function setAtribute($atribute)
    {
        $this->atribute = $atribute;
    }

    protected function getAtribute()
    {
        return $this->atribute;
    }

    protected function setDescription($description)
    {
        $this->description = $description;
    }

    protected function getDescription()
    {
        return $this->description;
    }

    protected function setProductTypeID($producttypeid)
    {
        $this->producttypeid = $producttypeid;
    }

    protected function getProductTypeID()
    {
        return $this->producttypeid;
    }

    protected function setTypeID($typeid)
    {
        $this->typeid = $typeid;
    }

    protected function getTypeID()
    {
        return $this->typeid;
    }
}

//setting ang getting all data
class GetData
{
    use SetData;
    public static $gtable;
    public static $gtypetable;
    public static $gid;
    public static $gsku;
    public static $gname;
    public static $gprice;
    public static $gproducttypeid;
    public static $gdesc;
    public static $gtitle;
    public static $gtypeid;
    public static $gatribute;

    //setting all
    public function _SetAll()
    {
        $this->setTableName('product');
        $this->setTypeTableName('producttype');
        $this->setID('ID');
        $this->setSKU('SKU');
        $this->setName('Name');
        $this->setPrice('Price');
        $this->setTitle('Title');
        $this->setAtribute('Atribute');
        $this->setDescription('Description');
        $this->setTypeID('IDType');
        $this->setProductTypeID('TypeID');
    } 

    //defining all to variables by getting
    public function _GetAll(){
        self::$gtable = $this->getTableName();
        self::$gtypetable = $this->getTypeTableName();
        self::$gid = $this->getID();
        self::$gsku = $this->getSKU();
        self::$gname = $this->getName();
        self::$gprice = $this->getPrice();
        self::$gproducttypeid = $this->getProductTypeID();
        self::$gdesc = $this->getDescription();
        self::$gtitle = $this->getTitle();
        self::$gtypeid = $this->getTypeID();
        self::$gatribute = $this->getAtribute();
    }

}
?>