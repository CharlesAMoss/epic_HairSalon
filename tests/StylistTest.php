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


    class StylistTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
      {
          Stylist::deleteAll();
          Client::deleteAll();
      }

      function test_stylist_getName()
      {
           //Arrange
           $name = "Vidal Sassoon";
           $test_stylist = new Stylist($name);

           //Act
           $result = $test_stylist->getName();

           //Assert
           $this->assertEquals($name, $result);

       }//end test

    //   function test_stylist_save()
    //   {
    //        //Arrange
    //        $name = "Vidal Sassoon";
    //        $test_stylist = new Stylist($name);
      //
    //        //Act
    //        $test_stylist->save();
      //
    //        //Assert
    //        $result = Stylist::getAll();
    //        $this->assertEquals($test_stylist,$result[0]);
    //   }


    //
    // function test_cuisine_getId()
    // {
    //      //Arrange
    //      $style = "Thai";
    //      $id = 1;
    //      $test_cuisine = new Cuisine($style, $id);
    //      //Act
    //      $result = $test_cuisine->getId();
    //      //Assert
    //      $this->assertEquals(true, is_numeric($result));
    // }

    //
    // function test_cuisine_getAll()
    // {
    //     //Arrange
    //     $style = "Thai";
    //     $id = null;
    //     $test_cuisine = new Cuisine($style, $id);
    //     $test_cuisine->save();
    //
    //     $name= "pok pok";
    //     $cuisine_id = $test_cuisine->getId();
    //     $test_restaurant = new Restaurant($name, $cuisine_id, $id);
    //     $test_restaurant->save();
    //
    //     $name2= "New Thai Blues";
    //     $test_restaurant2 = new Restaurant($name2, $cuisine_id, $id);
    //     $test_restaurant2->save();
    //
    //     //Act
    //     $result = Restaurant::getAll();
    //
    //     //Assert
    //     $this->assertEquals([$test_restaurant, $test_restaurant2], $result);
    // }
    //
    // function test_cuisine_find()
    // {
    //     //Arrange
    //     $cuisine1 = new Cuisine("Thai");
    //     $cuisine1->save();
    //     $cuisine2 = new Cuisine("Dogfood");
    //     $cuisine2->save();
    //
    //     //Act
    //     $id = $cuisine1->getId();
    //     $result = Cuisine::find($id);
    //
    //     //Assert
    //     $this->assertEquals($cuisine1, $result);
    // }
    //
    // function test_cuisine_update()
    // {
    //
    //     //Arrange
    //     $style = "Thai";
    //     $id = null;
    //     $test_cuisine = new Cuisine($style, $id);
    //     $test_cuisine->save();
    //
    //     $new_style = "Asian";
    //
    //     //Act
    //     $test_cuisine->update($new_style);
    //
    //     //Assert
    //     $this->assertEquals("Asian", $test_cuisine->getStyle());
    //
    //  }
    //
    //  function test_cuisine_delete()
    //  {
    //
    //      $style = "Thai";
    //      $test_cuisine = new Cuisine($style);
    //      $test_cuisine->save();
    //
    //      $style2 = "burgers";
    //      $test_cuisine2 = new Cuisine($style2);
    //      $test_cuisine2->save();
    //
    //      $name = "Pok Pok";
    //      $category_id = $test_cuisine->getId();
    //      $test_restaurant = new Restaurant($name, $category_id);
    //      $test_restaurant->save();
    //
    //      $name2 = "Dicks";
    //      $category_id2 = $test_cuisine2->getId();
    //      $test_restaurant2 = new Restaurant($name2, $category_id2);
    //      $test_restaurant2->save();
    //
    //
    //      //Act
    //      $test_cuisine->delete();
    //
    //      //Assert
    //      $this->assertEquals([$test_restaurant2],Restaurant::getAll());
    //
    //  }

}
?>
