<?php

namespace App\Models;

class GreetingGenerator
{
    public function getRandomGreeting(): String
    {
        $greetings = ['Hey', 'Yo', 'Aloha'];
        return $greetings[array_rand($greetings)];
    }
}