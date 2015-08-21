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
        return $this->name;
    }

    function getId()
    {
        return $this->id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->getName()}')");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }// save

    // static function getAll()
    // {
    //     $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
    //     $cuisines = array();
    //     foreach($returned_stylists as $stylist) {
    //         $name = $stylist['name'];
    //         $id = $stylists['id'];
    //         $new_stylist = new Stylist($name, $id);
    //         array_push($stylists, $new_stylist);
    //     }//end of foreach
    //     return $stylists;
    // }//end of getAll

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");
    }// end of deleteAll

}// end of Client class

?>
