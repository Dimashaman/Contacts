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
        $numItems = count($this->contacts);
        $i = 0;
        foreach ($this->contacts as $contact) {
            if (++$i === $numItems) {
                $greetings = rtrim($greetings, ', ') . ' & ' . $contact->firstName;
            } else {
                $greetings = $greetings . $contact->firstName . ", ";
            }
        }

        return $greetings;
    }

    public function makeAdressats()
    {
        $adressats = "";
        $numItems = count($this->contacts);
        $i = 0;

        usort($this->contacts, function ($a, $b) {
            return strcmp($a->lastName, $b->lastName);
        });

        foreach ($this->contacts as $key => $contact) {
            if (++$i === $numItems) {
                if ($this->contacts[$key - 1]->lastName === $contact->lastName) {
                    $adressats = $this->str_lreplace(', ', ' and ', $adressats);
                    $adressats = $adressats . $contact->fullName;
                } else {
                    $adressats = rtrim($adressats, ', ') . ' and ' . $contact->fullName;
                }
            } else {
                if ($this->contacts[$key + 1]->lastName === $contact->lastName) {
                    $adressats = $adressats . $contact->firstName . ' & ';
                } else {
                    $adressats = $adressats . $contact->fullName . ", ";
                }
            }
        }

        return $adressats;
    }

    private function sortContacts()
    {
        usort($this->contacts, function ($a, $b) {
            return strcmp($a->lastName, $b->lastName);
        });
    }

    private function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
    
        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }
    
        return $subject;
    }
}
