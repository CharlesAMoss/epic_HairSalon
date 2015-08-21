<?php

class Client {

    private $name;
    private $stylist_id;
    private $id;
    private $appointment;

    function __construct($name, $stylist_id, $id=null, $appointment)
    {
        $this->name = $name;
        $this->stylist_id = $stylist_id;
        $this->id = $id;
        $this->appointment = $appointment;

    }

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

}

?>
