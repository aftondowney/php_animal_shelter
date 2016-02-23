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
            
        }
    }
 ?>
