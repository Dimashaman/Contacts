<?php

use Dima\App\Contact;
use Dima\App\ContactCollection;

require_once 'vendor/autoload.php';

echo (new ContactCollection([
    new Contact('Peter', 'Griffin'),
    new Contact('Loice', 'Griffin'),
    new Contact('Homer', 'Simpson'),
    new Contact('Marge', 'Simpson'),
    new Contact('Garry', 'Potter'),
]))->makeGreeting();