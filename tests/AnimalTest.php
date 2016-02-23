
    <!-- /**
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
        } -->

        <!-- // function test_save()
        // {
        //     $name = "Skittles";
        //     $gender = "female";
        //     $date_admitted = "2015-8-3";
        //     $breed = "calico";
        //     $id = null;
        //     $test_animal = new AnimalType($name)
        //     $test_
        // }
    } -->
