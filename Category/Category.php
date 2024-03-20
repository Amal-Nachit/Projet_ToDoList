<?php
namespace Category;


class Category{

    private $ID_CATEGORY;
    private $NAME;
   
    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }

    

    /**
     * Get the value of ID_CATEGORY
     */
    public function getIDCATEGORY()
    {
        return $this->ID_CATEGORY;
    }

    /**
     * Set the value of ID_CATEGORY
     */
    public function setIDCATEGORY($ID_CATEGORY): self
    {
        $this->ID_CATEGORY = $ID_CATEGORY;

        return $this;
    }

    /**
     * Get the value of NAME
     */
    public function getNAME()
    {
        return $this->NAME;
    }

    /**
     * Set the value of NAME
     */
    public function setNAME($NAME): self
    {
        $this->NAME = $NAME;

        return $this;
    }
}