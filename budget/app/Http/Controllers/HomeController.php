<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user_id = get_user()->id;
        $response = $this->client->get($this->api_service."/api/v1/transaction/total?user_id=$user_id");
        $data = json_decode($response->getBody())->data;

        return view('welcome', with(['data' => $data]));
    }
}
