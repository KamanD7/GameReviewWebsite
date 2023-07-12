<?php

namespace App\Controllers;

class MainPage extends BaseController
{

    public function index() {
        return view('mainpages/MainPageView');
    }

    public function 2Auth() {
        $client_id = 'ut4c1tri0dk2jr7waogzdk99mipauk';
        $authorization = 'bearer 41l7ubyitpht7ti1c7uivmwopcxkf2';
        $url = 'https://api.igdb.com/v4/games';
        $fields = 'cover.image_id, name, summary';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'fields' => $fields,
            'limit' => 10, 
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Client-ID: ' . $client_id,
            'Authorization: ' . $authorization,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            echo 'Error: ' . $error;
            return;
        }

        curl_close($ch);

        $data = json_decode($response, true);

        if (is_null($data)) {
            echo 'error: failed to decode JSON response';
            return;
        }

        $gameList = $data;

        return view('mainpages/MainPageView', ['gameslist' => $gameslist]);
    }
}