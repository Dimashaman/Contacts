<?php
use Dima\App\Contact;
use Dima\App\ContactCollection;
use PHPUnit\Framework\TestCase;

class ContactCollectionTest extends TestCase
{
    public function testItMakesAdressats()
    {
        $collection = new ContactCollection([
            new Contact('Peter', 'Griffin'),
            new Contact('Loice', 'Griffin'),
            new Contact('Homer', 'Simpson'),
            new Contact('Marge', 'Simpson'),
            new Contact('Garry', 'Potter'),
        ]);

        $this->assertSame('Peter & Loice Griffin, Garry Potter and Homer & Marge Simpson', $collection->makeAdressats());
    }

    public function testItMakesGreetings()
    {
        $collection = new ContactCollection([
            new Contact('Peter', 'Griffin'),
            new Contact('Loice', 'Griffin'),
            new Contact('Homer', 'Simpson'),
            new Contact('Marge', 'Simpson'),
            new Contact('Garry', 'Potter'),
        ]);

        $collection2 = new ContactCollection([
            new Contact('Peter', 'Griffin'),
            new Contact('Loice', 'Griffin'),
            new Contact('Donald', 'Duck'),
            new Contact('Homer', 'Simpson'),
            new Contact('Marge', 'Simpson'),
            new Contact('Garry', 'Potter'),
        ]);

        $this->assertSame('Hi Peter, Loice, Garry, Homer & Marge', $collection->makeGreeting());
        $this->assertSame('Hi Donald, Peter, Loice, Garry, Homer & Marge', $collection2->makeGreeting());
    }
}