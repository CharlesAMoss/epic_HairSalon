<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";


    $server = 'mysql:host=localhost;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password );


    class StylistTest extends PHPUnit_Framework_TestCase
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
           $id = 1;
           $test_stylist = new Stylist($name, $id);

           //Act
           $result = $test_stylist->getName();
           $result2 = $test_stylist->getId();

           //Assert
           $this->assertEquals($name, $result);
           $this->assertEquals(true, is_numeric($result2));
        }//end test

        function test_stylist_save()
        {
           //Arrange
           $name = "Vidal Sassoon";
           $test_stylist = new Stylist($name);

           //Act
           $test_stylist->save();

           //Assert
           $result = Stylist::getAll();
           $this->assertEquals($test_stylist,$result[0]);
        }//end test

        function test_stylist_find()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Monsieur Champagne";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $id = $test_stylist->getId();
            $result = Stylist::find($id);

            //Assert
            $this->assertEquals($test_stylist, $result);
        }//end test

        function test_stylist_getALL()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Monsieur Champagne";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }//end test

        function test_stylist_update()
        {
            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $new_name = "Vidal Baboon";

            //Act
            $test_stylist->update($new_name);

            //Assert
            $this->assertEquals($new_name, $test_stylist->getName());
        }//end test

        function test_stylist_delete()
        {

            //Arrange
            $name = "Vidal Sassoon";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name2 = "Monsieur Champagne";
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();


            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_stylist2],Stylist::getAll());
        }//end test

        function test_stylist_getClient()
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
            $result = $test_stylist->getClient();

            //Assert
            $this->assertEquals($test_client,$result[0]);
        }//end test
































    }//end of tests

?>
