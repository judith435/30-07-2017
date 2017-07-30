<?php
    interface IAnimal {
        function voice();
    }

    class Animal {

        function __construct() {
            echo "Hi<br>";
        }

        function sayHello() {
            return "Hello";
        }

    }

    class Dog extends Animal implements IAnimal {

        function __construct() {
            //parent::__construct();
            echo "Hi2<br>";
        }

        function voice() {
            return "Woof";
        }
    }

    class Cat extends Animal implements IAnimal {
        function voice() {
            return "Miaw";
        }
    }

    $dog = new Dog();
    echo $dog->sayHello();


?>