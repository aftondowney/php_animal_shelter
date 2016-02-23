<?php
    require_once __DIR__."/../vendor/autolaod.php";
    require_once __DIR__."/../src/Animal.php";
    require_once __DIR__."/../src/AnimalType.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=animal_shelter';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('homepage.html.twig', array('animalTypes' => AnimalType::getall()));
    });

    $app->get("/animals/{id}", function($id) use ($app) {
        $type = AnimalType::find($id);
        return $app['twig']->render('type.html.twig', array('type' => $type, 'animals' => $type->getAnimals()));
    });

    $app->post("/animals", function() use ($app) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $date_admitted = $_POST['date_admitted'];
        $breed = $_POST['breed'];
        $type_id = $_POST['type_id'];
        $animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id = null);
        $animal->save();
        $type = AnimalType::find($type_id);
        return $app['twig']->render('type.html.twig', array('type' => $type, 'animals' => $type->getAnimals()));
    })

    return $app;
 ?>
