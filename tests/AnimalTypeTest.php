<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/AnimalType.php";

    $server = 'mysql:host=localhost;dbname=animal_shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class AnimalTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Animal::deleteAll();
        //     AnimalType::deleteAll();
        // }

        function test_getType()
        {
            //Arrange
            $type = "Cat";
            $test_Type = new AnimalType($type);

            //Act
            $result = $test_Type->getType();

            //Assert
            $this->assertEquals($type, $result);
        }
    }
 ?>
