<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer as IncomingAnswer;
use BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()

    {

        $botman = app('botman');

  

        $botman->hears('{message}', function($botman, $message) {

            $checkfor = ['assistance', 'category', 'order', 'product',];


            if ($message == 'hi' OR $message == 'Hi' OR $message == 'hello') {

                $this->askName($botman);

            }
            elseif(strpos($message, $checkfor[0]) !== false){
                $botman->reply('The patient is in the car');
            }
            elseif(strpos($message, $checkfor[3]) !== false){
                $botman->reply('Clothes, Shoes');
            }
            elseif(strpos($message, $checkfor[2]) !== false){
                $botman->reply('An order takes within 24 hours to get to your destination');
            }
            elseif(strpos($message, $checkfor[4]) !== false){
                $botman->reply('Hover on the cart icon to pay for your product');
            }
            elseif(strpos($message, $checkfor[1]) !== false){
                $botman->reply("Mens's wear, Children's wear, Women's wear and accessories");
            }
            // elseif($message == 'hey man'){
            //     $botman->reply('hello');
            // }
            // elseif($message == 'hey man'){
            //     $botman->reply('hello');
            // }
            else{

                $botman->reply("write 'hi' for testing...");

            }

  

        });

  

        $botman->listen();

    }

  

    /**

     * Place your BotMan logic here.

     */

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(IncomingAnswer $answer) {
            $name = $answer->getText();
             $this->say('How can I help you'.$name);
          
        });

    }
    public function done($botman)
    {
        $botman->ask('Are you done?', function(IncomingAnswer $answer) {
            // $name = $answer->getText();
            $this->say('Nice to meet you ');
          
        });

    }

    public function thanks()
    {
        $this->say('Thank you');
    }
}