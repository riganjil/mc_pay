<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $response = $this->client->get($this->api_service."/api/v1/user");
        $data = json_decode($response->getBody())->data;
        return view('pages.user.list', with(['data' => $data]));
    }

}
