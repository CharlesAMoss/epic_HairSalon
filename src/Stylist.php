<?php

class Stylist {

    private $name;
    private $id;

    function __construct($name, $id=null)
    {
        $this->name = $name;
        $this->id = $id;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->stylist;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }


?>
