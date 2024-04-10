<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail {
    public function send($from_email, $from_name, $suject, $content){
        $mj = new Client($_ENV['MJ_APIKEY_PUBLIC'], $_ENV['MJ_APIKEY_PRIVATE'],true,['version' => 'v3.1']);

// Define your request body

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => 'batoo82000@gmail.com',
                        'Name' => $from_name
                    ],
                    'To' => [
                        [
                            'Email' => "batoo82000@gmail.com",
                            'Name' => "Sébastien"
                        ]
                    ],
                    'Subject' => $suject,
                    'TextPart' => "Greetings from Mailjet!",
                    'HTMLPart' => 'Message de : '. $from_name .'. ' . 'Email : ' . $from_email .'. '. 'Contenu du message : ' .$content
                ]
            ]
        ];

// All resources are located in the Resources class

       $mj->post(Resources::$Email, ['body' => $body]);

    }
}