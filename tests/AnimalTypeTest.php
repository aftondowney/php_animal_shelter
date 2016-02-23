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

    class AnimalTypeTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Animal::deleteAll();
            AnimalType::deleteAll();
        }

        function test_getType()
        {
            //Arrange
            $type = "cat";
            $test_Type = new AnimalType($type);

            //Act
            $result = $test_Type->getType();

            //Assert
            $this->assertEquals($type, $result);
        }

        function test_getId()
        {
            //arrange
            $type = "cat";
            $id = 1;
            $test_Type = new AnimalType($type, $id);

            //Act
            $result = $test_Type->getId();

            //assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //arrange
            $type = "cat";
            $test_Type = new AnimalType($type);
            $test_Type->save();

            //Act
            $result = AnimalType::getAll();

            //assert
            $this->assertEquals($test_Type, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $test_Type = new AnimalType($type);
            $test_Type->save();
            $test_Type2 = new AnimalType($type2);
            $test_Type2->save();

            //Act
            $result = AnimalType::getAll();

            //Assert
            $this->assertEquals([$test_Type, $test_Type2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $type = "cat";
            $type2 = "dog";
            $test_Type = new AnimalType($type);
            $test_Type->save();
            $test_Type2 = new AnimalType($type2);
            $test_Type2->save();

            //Act
            AnimalType::deleteAll();
            $result = AnimalType::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

        function test_find()
        {
            //arrange
            $type = "cat";
            $type2 = "dog";
            $test_Type = new AnimalType($type);
            $test_Type->save();
            $test_Type2 = new AnimalType($type2);
            $test_Type2->save();

            //Act
            $result = AnimalType::find($test_Type->getId());

            //assert
            $this->assertEquals($test_Type, $result);
        }
    }
 ?>
