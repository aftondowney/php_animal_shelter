<?php

    class AnimalType
    {
        private $type;
        private $id;

        function __construct($type, $id = null)
        {
            $this->type = $type;
            $this->id = $id;
        }

        function setType($new_type)
        {
            $this->type = $new_type;
        }

        function getType()
        {
            return $this->type;
        }

        function getID()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO categories (name) VALUES ('{$this->getType()}')");
            $this->id= $GLOBALS['DB']->lastInsertID();
        }

        static function getAll()
        {
            $returned_type = $GLOBALS['DB']->query("SELECT * FROM animal_type;");
            $types = array();
            foreach($returned_type as $animal_type) {
                $type = $animal_type['type'];
                $id = $animal_type['id'];
                $new_type = new AnimalType($type, $id);
                array_push($animal_type, $new_type);
            }
            return $types;
        }
    }



?>
