<?php
    class Animal
    {
        private $name;
        private $gender;
        private $date_admitted;
        private $breed;
        private $type_id;
        private $id;

        function __construct($name, $gender, $date_admitted, $breed, $type_id, $id)
        {
            $this->name = $name;
            $this->gender = $gender;
            $this->date_admitted = $date_admitted;
            $this->breed = $breed;
            $this->type_id = $type_id;
            $this->id = $id;
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function getName()
        {
            return $this->name;
        }

        function setGender($gender)
        {
            $this->gender = $gender;
        }

        function getGender()
        {
            return $this->gender;
        }

        function setDateAdmitted($date_admitted)
        {
            $this->date_admitted = $date_admitted;
        }

        function getDateAdmitted()
        {
            return $this->date_admitted;
        }

        function setBreed($breed)
        {
            $this->breed = $breed;
        }

        function getBreed()
        {
            return $this->breed;
        }

        function getTypeId()
        {
            return $this->type_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO animal (name, gender, date_admitted, breed, type_id) VALUES ('{$this->getName()}', '{$this->getGender()}', '{$this->getDateAdmitted()}', '{$this->getBreed()}', '{$this->getTypeId()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM animal;");
            $animals = array();
            foreach ($returned_animals as $animal) {
                $name = $animal['name'];
                $gender = $animal['gender'];
                $date_admitted = $animal['date_admitted'];
                $breed = $animal['breed'];
                $id = $animal['id'];
                $type_id = $animal['type_id'];
                $new_animal = new Animal($name, $gender, $date_admitted, $breed, $type_id, $id);
                array_push($animals, $new_animal);
            }
            return $animals;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM animal;");
        }

    }
 ?>
