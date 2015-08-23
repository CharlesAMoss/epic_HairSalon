<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";


    $server = 'mysql:host=127.0.0.1;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();

        }

        function test_client_getTest()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $name2 = "Mr. T";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name2, $stylist_id, null );
            $test_client->save();

            //Act
            $result = $test_client->getName();
            $result2 = $test_client->getStylistId();


            //Assert
            $this->assertEquals($name2, $result, 'name');
            $this->assertEquals($stylist_id, $result2, 'stylist_id');

        }//end test

        function test_stylist_save()
        {
           //Arrange
           $name = "Vidal Sassoon";
           $id = null;
           $test_stylist = new Stylist($name, $id);
           $test_stylist->save();

           $name2 = "Mr. T";
           $stylist_id = $test_stylist->getId();
           $test_client = new Client($name2, $stylist_id, null );

           //Act
           $test_client->save();

           //Assert
           $result = Client::getAll();
           $this->assertEquals($test_client,$result[0]);
        }//end test

        function test_client_find()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Sweeney Todd";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $name3 = "Mr. T";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name3, $stylist_id, null);
            $test_client->save();

            $name4 = "Mrs. T";
            $stylist_id2 = $test_stylist2->getId();
            $test_client2 = new Client($name4, $stylist_id2, null);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }//end test

        function test_stylist_getALL()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Sweeney Todd";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            $name3 = "Mr. T";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name3, $stylist_id, null);
            $test_client->save();

            $name4 = "Mrs. T";
            $stylist_id2 = $test_stylist2->getId();
            $test_client2 = new Client($name4, $stylist_id2, null);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }//end test




    }//end of tests



?>
