<?php
namespace Priority;


class Priority{

    private $ID_PRIORITY;
    private $NAME;
   
    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }
    /**



  
     * Get the value of ID_PRIORITY
     */
    public function getIDPRIORITY()
    {
        return $this->ID_PRIORITY;
    }

    /**
     * Set the value of ID_PRIORITY
     */
    public function setIDPRIORITY($ID_PRIORITY): self
    {
        $this->ID_PRIORITY = $ID_PRIORITY;

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