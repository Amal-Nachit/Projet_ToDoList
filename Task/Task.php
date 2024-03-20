<?php
namespace Task;

class Task{
    private $ID_TASK;
    private $TITLE;
    private $DESCRIPTION;
    private $DATE;
    private $ID_USER;
    private $ID_PRIORITY;
function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
}
}

    /**
     * Get the value of ID_TASK
     */
    public function getIDTASK()
    {
        return $this->ID_TASK;
    }

    /**
     * Set the value of ID_TASK
     */
    public function setIDTASK($ID_TASK): self
    {
        $this->ID_TASK = $ID_TASK;

        return $this;
    }


    /**
     * Get the value of TITLE
     */
    public function getTITLE()
    {
        return $this->TITLE;
    }

    /**
     * Set the value of TITLE
     */
    public function setTITLE($TITLE): self
    {
        $this->TITLE = $TITLE;

        return $this;
    }

    /**
     * Get the value of DESCRIPTION
     */
    public function getDESCRIPTION()
    {
        return $this->DESCRIPTION;
    }

    /**
     * Set the value of DESCRIPTION
     */
    public function setDESCRIPTION($DESCRIPTION): self
    {
        $this->DESCRIPTION = $DESCRIPTION;

        return $this;
    }

    /**
     * Get the value of DATE
     */
    public function getDATE()
    {
        return $this->DATE;
    }

    /**
     * Set the value of DATE
     */
    public function setDATE($DATE): self
    {
        $this->DATE = $DATE;

        return $this;
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
    }
