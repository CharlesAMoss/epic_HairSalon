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

    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
        $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
    }//end of delete

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

    function getClient()
    {
        $clients = array();
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
        foreach($returned_clients as $client) {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $stylist_id, $id);
            array_push($clients, $new_client);
        }//end of foreach

        return $clients;
    }//end of getClient

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

}// end of Stylist class

?>
