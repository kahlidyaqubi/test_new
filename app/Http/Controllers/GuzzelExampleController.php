<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuzzelExampleController extends Controller
{
     public function index(){
         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos/1');

         //echo $response->getBody();

         $userStatus = json_decode($response->getBody()); 
         echo ('userId = ' . $userStatus->userId);
         echo ('<br>title = ' . $userStatus->title);
     }
}
