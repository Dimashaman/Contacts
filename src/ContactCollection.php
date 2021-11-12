<?php

namespace Dima\App;

class ContactCollection
{
    private $contacts;

    public function __construct(array $contacts = [])
    {
        $this->contacts = $contacts;
        $this->sortContacts();
    }

    public function makeGreeting()
    {
        $greetings = "Hi ";
        $greetingsArray = [];
        while ($contact = \array_shift($this->contacts)) {
            $greetingsArray[] = $contact->firstName;
        }

        $lastContact  = array_pop($greetingsArray);
        $greetingsString = $greetings . \implode(", ", $greetingsArray) . " & " . $lastContact;

        return $greetingsString;
    }

    public function makeAdressats()
    {
        $adressatsArray = [];
        while ($contact = \array_shift($this->contacts)) {
            $contactName = '';
            if ($contact->lastName === $this->contacts[0]->lastName) {
                $contactName = $contact->firstName . " & " . $this->contacts[0]->fullName;
                \array_shift($this->contacts);
            } else {
                $contactName = $contact->fullName;
            }
            $adressatsArray[] = $contactName;
        }

        $lastContact  = array_pop($adressatsArray);
        $addressatsString = \implode(", ", $adressatsArray) . " and " . $lastContact;
        
        return $addressatsString;
    }

    private function sortContacts()
    {
        usort($this->contacts, function ($a, $b) {
            return strcmp($a->lastName, $b->lastName);
        });
    }

}
