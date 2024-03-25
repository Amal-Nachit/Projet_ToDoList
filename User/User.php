<?php
namespace User;


class User{    

    private $ID_USER;
    private $FIRST_NAME;
    private $LAST_NAME;
    private $PASSWORD;
    private $EMAIL;



   
    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }

    }

  

    /**
     * Get the value of ID_USER
     */
    public function getIDUSER()
    {
        return $this->ID_USER;
    }

    /**
     * Set the value of ID_USER
     */
    public function setIDUSER($ID_USER): self
    {
        $this->ID_USER = $ID_USER;

        return $this;
    }

    /**
     * Get the value of FIRST_NAME
     */
    public function getFIRSTNAME()
    {
        return $this->FIRST_NAME;
    }

    /**
     * Set the value of FIRST_NAME
     */
    public function setFIRSTNAME($FIRST_NAME): self
    {
        $this->FIRST_NAME = $FIRST_NAME;

        return $this;
    }

    /**
     * Get the value of LAST_NAME
     */
    public function getLASTNAME()
    {
        return $this->LAST_NAME;
    }

    /**
     * Set the value of LAST_NAME
     */
    public function setLASTNAME($LAST_NAME): self
    {
        $this->LAST_NAME = $LAST_NAME;

        return $this;
    }

    /**
     * Get the value of PASSWORD
     */
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    /**
     * Set the value of PASSWORD
     */
    public function setPASSWORD($PASSWORD): self
    {
        $this->PASSWORD = $PASSWORD;

        return $this;
    }

    /**
     * Get the value of EMAIL
     */
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    /**
     * Set the value of EMAIL
     */
    public function setEMAIL($EMAIL): self
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }
    }