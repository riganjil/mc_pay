<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request  $request)
    {
        $data_login = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        try {
            $response = $this->client->post($this->api_service."/api/v1/login", [
                'form_params' => $data_login
            ]);
            $res = json_decode($response->getBody());
            session()->put('api_key', $res->data->api_key);
            session()->put('user', $res->data->user);
            return redirect('/');
        } catch (\Exception $exception) {
            return redirect("/login")->with(["error" => "Invalid email or password"]);
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
