<?php


namespace BlueCloud\SimpleAPNS;


use Pushok\AuthProvider\Token;
use Pushok\Client;
use Pushok\Notification;
use Pushok\Payload;
use Pushok\Payload\Alert;

class APNSNotifier
{

    public function send(APNSMessage $message)
    {

        $this->push($message);

        if ($message->isContent()) {
            $this->push($message, true);
        }

    }

    private function push(APNSMessage $message, bool $content = false)
    {
        $provider = Token::create([
            'key_id' => config("apns.key_id"),
            'team_id' => config("apns.team_id"), // The Team ID obtained from Apple developer account
            'app_bundle_id' => config("apns.app_bundle"), // The bundle ID for app obtained from Apple developer account
            'private_key_path' => storage_path("app/apns_key.p8"),
            'private_key_secret' => config("apns.key_secret") // Private key secret
        ]);

        $alert = Alert::create();
        $alert->setTitle($message->getTitle());
        $alert->setBody($message->getMessage());

        $payload = Payload::create()->setAlert($alert)->setSound("default");
        $payload->setContentAvailability($content);

        $client = new Client($provider, $production = false);
        $client->addNotifications([new Notification($payload, $message->getToken())]);

        $client->push();
    }
}
