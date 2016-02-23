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
        protected function tearDown()
        {
            Animal::deleteAll();
            AnimalType::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);

            //Act
            $test_animal->save();

            //Assert
            $result = Animal::getAll();
            $this->assertEquals($test_animal, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
            $test_animal->save();

            $name2 = "Chairman Meow";
            $gender2 = "male";
            $date_admitted2 = "2015-08-10";
            $breed2 = "siamese";
            $test_animal2 = new Animal($name2, $gender2, $date_admitted2, $breed2, $type_id, $id);
            $test_animal2->save();

            //Act
            $result = Animal::getAll();

            //Assert
            $this->assertEquals([$test_animal, $test_animal2], $result);
        }

        function test_deleteAll()
        {
            //arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
            $test_animal->save();

            $name2 = "Chairman Meow";
            $gender2 = "male";
            $date_admitted2 = "2015-08-10";
            $breed2 = "siamese";
            $test_animal2 = new Animal($name2, $gender2, $date_admitted2, $breed2, $type_id, $id);
            $test_animal2->save();

            //Act
            Animal::deleteAll();

            //assert
            $result = Animal::getAll();
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
            $test_animal->save();

            $name2 = "Chairman Meow";
            $gender2 = "male";
            $date_admitted2 = "2015-08-10";
            $breed2 = "siamese";
            $test_animal2 = new Animal($name2, $gender2, $date_admitted2, $breed2, $type_id, $id);
            $test_animal2->save();

            //Act
            $result = Animal::find($test_animal->getId());

            //Assert
            $this->assertEquals($test_animal, $result);

        }

        function test_alphabetize()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
            $test_animal->save();

            $name2 = "Chairman Meow";
            $gender2 = "male";
            $date_admitted2 = "2015-08-10";
            $breed2 = "siamese";
            $test_animal2 = new Animal($name2, $gender2, $date_admitted2, $breed2, $type_id, $id);
            $test_animal2->save();

            //Act
            $result = Animal::alphabetize();

            //Assert
            $this->assertEquals([$test_animal2, $test_animal], $result);
        }

        function test_orderByDateAdmitted()
        {
            //Arrange
            $type = "cat";
            $id = null;
            $test_Type = new AnimalType($type, $id);
            $test_Type->save();

            $name = "Skittles";
            $gender = "female";
            $date_admitted = "2015-08-03";
            $breed = "calico";
            $type_id = $test_Type->getId();
            $test_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
            $test_animal->save();

            $name2 = "Chairman Meow";
            $gender2 = "male";
            $date_admitted2 = "2015-08-10";
            $breed2 = "siamese";
            $test_animal2 = new Animal($name2, $gender2, $date_admitted2, $breed2, $type_id, $id);
            $test_animal2->save();

            //Act
            $result = Animal::orderByDateAdmitted();

            //Assert
            $this->assertEquals([$test_animal, $test_animal2], $result);
        }
    }

 ?>
