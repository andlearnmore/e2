<?php

class Person 
{
    # Properties
    public $firstName;
    public $lastName;
    public $age;

    # Methods
    public function __construct(string $firstName, string $lastName, int $age) 
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFullName() 
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function getClassification()
    {
        # return 'adult' if age >=18 or 'minor' if age is < 18
        return ($this->age < 18) ? 'minor' : 'adult';
    }
}

$person = new Person('John', 'Harvard', 45);
$person2 = new Person('Joy', 'Buolamwini', 33);
$person3 = new Person('Pippi', 'Longstocking', 9);

echo $person->getFullName();
echo $person->getClassification();

echo $person2->getFullName();
echo $person2->getClassification();

echo $person3->getFullName();
echo $person3->getClassification();