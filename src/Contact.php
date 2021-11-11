<?php

namespace Dima\App;

class Contact
{
    public $firstName;
    
    public $lastName;

    public $fullName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->fullName = $firstName . " " . $lastName;
    }
}
