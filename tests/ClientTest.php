<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";
    require "secret/stuff.php";


    $server = 'mysql:host=127.0.0.1;dbname=hair_salon_test';
    $username = 'root';
    $password = $pass;
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          Stylist::deleteAll();
          Client::deleteAll();
        }

        function test_stylist_getTest()
        {
           //Arrange
           $name = "Vidal Sassoon";
           $id = null;
           $test_stylist = new Stylist($name, $id);
           $test_stylist->save();

           $name2 = "Mr. T";
           $stylist_id = $test_stylist->getId();
           $appointment = "09/09/2015";
           $test_client = new Client($name2, $stylist_id, null, $appointment);
           $test_client->save();

           //Act
           $result = $test_client->getName();
           $result2 = $test_client->getId();
           $result3 = $test_client->getAppointment();

           //Assert
           $this->assertEquals($name2, $result);
           $this->assertEquals($stylist_id, $result2);
           $this->assertEquals($appointment, $result3);
        }//end test


    }//end of tests



?>
