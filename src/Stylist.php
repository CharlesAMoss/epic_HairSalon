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
    }//end of save

    function update($new_name)
    {
        $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}' WHERE id = {$this->getId()};");
        $this->setName($new_name);
    }//end of update

    static function find($search_id)
    {
        $found_stylist = null;
        $stylists = Stylist::getAll();
        foreach($stylists as $stylist) {
            $stylist_id = $stylist->getId();
            if ($stylist_id == $search_id) {
              $found_stylist = $stylist;
            }//end of if
        }//end of foreach

        return $found_stylist;
    }//end of find

    static function getAll()
    {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
        $stylists = array();
        foreach($returned_stylists as $stylist) {
            $name = $stylist['name'];
            $id = $stylist['id'];
            $new_stylist = new Stylist($name, $id);
            array_push($stylists, $new_stylist);
        }//end of foreach

        return $stylists;
    }//end of getAll

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");
    }// end of deleteAll

}// end of Client class

?>
