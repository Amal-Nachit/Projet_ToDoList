<?php

namespace RelationTaskCategory;
use Category\Category;
use Task\Task;

class RelationTaskCategory{
    private Task $ID_TASK;
    private Category $ID_CATEGORY;

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
    }

    

