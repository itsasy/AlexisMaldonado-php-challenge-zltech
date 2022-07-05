<?php

namespace App\Services;

use App\Contact;

const CONTACTS = [
    array('name' => 'Alexis', 'last_name' => 'Silva', 'phone_number' => '918363389', 'email' => 'alesilva@gmail.com'),
    array('name' => 'Isaac', 'last_name' => 'Maldonado', 'phone_number' => '933530122', 'email' => '23213@gmail.com'),
    array('name' => 'Juan', 'last_name' => 'Asiac', 'phone_number' => '93353323', 'email' => 'asdasd@gmail.com')
];

class ContactService
{

    public static function findByName(string $name): Contact
    {
        foreach (CONTACTS as $contact) {
            if ($name == $contact['name']) {
                return new Contact(
                    $contact['name'],
                    $contact['last_name'],
                    $contact['phone_number'],
                    $contact['email']
                );
            }
        }
        return new Contact('', '', '', '');
    }

    public static function validateNumber(string $number): bool
    {
        if (is_numeric($number)) {
            foreach (CONTACTS as $contact) {
                if ($number == $contact['phone_number']) {
                    return true;
                }
            }
            return false;
        } else {
            return false;
        }
    }
}
