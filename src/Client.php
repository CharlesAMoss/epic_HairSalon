<?php

class Client {

    private $name;
    private $stylist_id;
    private $id;
    private $appointment;

    function __construct($name, $stylist_id, $id=null, $appointment='')
    {
        $this->name = $name;
        $this->stylist_id = $stylist_id;
        $this->id = $id;
        $this->appointment = $appointment;

    }//end of constructor

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function getName()
    {
        return $this->name;
    }

    function getStylistId()
    {
        return $this->stylist_id;
    }

    function getId()
    {
        return $this->id;
    }

    function setAppointment($new_appointment)
    {
        $this->appointment = (string) $new_appointment;
    }

    function getAppointment()
    {
        return $this->appointment;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id, appointment) VALUES ('{$this->getName()}', {$this->getStylistId()}, {$this->getAppointment()})");
        $this->id= $GLOBALS['DB']->lastInsertId();
    }//end of save

    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
        $clients = array();
        foreach($returned_clients as $client) {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $appointment = $client['appointment'];
            $new_client = new Client($name, $stylist_id, $id, $appointment);
            array_push($clients, $new_client);
        }//end of foreach

        return $clients;
    }//end of get all

    static function find($search_id)
    {
        $found_client = null;
        $clients = Client::getAll();
        foreach($clients as $client) {
            $client_id = $client->getId();
            if ($client_id == $search_id) {
                $found_client = $client;
            }//end of if
        }//end of foreach

        return $found_client;
    }//end of find

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients;");
    }//end of delete all



}

?>
