<?php

    class College {
        private  $name = "John Bryce"; 
        private  $branches = [];
        private  $courses = [];

        private function __construct()
        {
        }

        public static function AddCourse($c)
        {
            //array_push(self::courses, $c);
            $dada = self::getCourses();
            $tada = $c;
        }

        public static function Instance($branches, $courses)
        {
            static $inst = null;
            if ($inst === null) {
                $inst = new College();
                $inst->branches = $branches;
                $inst->courses = $courses;
            }
            return $inst;
        }
        public  function getCourses()
        {
            return $this->courses;
        }
        public  function getName()
        {
            return $this->name;
        }

    }

    class Branch {

        private $address;

        function __construct($addr) {
            $this->address = $addr;
        }

        function getAddress() {
            return $this->address;
        }

        function setAddress($addr) {
            $this->address = $addr;
        }

    }

    class Course {

        private $name;
        private $capacity;
        private $isEvening;

        function __construct($name, $capacity, $isEvening) {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->isEvening = $isEvening;
        }

        function getName() {
            return $this->name;
        }

        function setName($name) {
            $this->name = $name;
        }

        function getCapacity() {
            return $this->capacity;
        }

        function setCapacity($capacity) {
            $this->capacity = $capacity;
        }

        function getIsEvening() {
            return $this->isEvening;
        }

        function setIsEvening($isEvening) {
            $this->isEvening = $isEvening;
        }
    }

    $course1 = new Course('fullstack', 24, 1);
    $course2 = new Course('dot net', 18, 0);
    $course3 = new Course('android', 15, 1);
    $courses = array($course1, $course2, $course3);

    $branch1 = new Branch('ta');

    $branch2 = new Branch('jerusalem');

    $branch3 = new Branch('haifa');
    $branches = array($branch1, $branch2, $branch3);

    $College = College::Instance($branches, $courses);
    $College1 = College::Instance($branches, $courses);
    $course4 = new Course('sql', 4, 0);
    College::AddCourse($course4); 
    //$College2 = UserFactory::Instance();


?>