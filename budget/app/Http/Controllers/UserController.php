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

    public function add()
    {
        return view('pages.user.add');
    }

    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
        ];
        try {
            $response = $this->client->post($this->api_service."/api/v1/user", [
                'form_params' => $data
            ]);
            $res = json_decode($response->getBody());
            return redirect('/user');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $response = $this->client->get($this->api_service."/api/v1/user/$id");
        $data = json_decode($response->getBody())->data;
        return view('pages.user.edit', with(['data' => $data]));
    }

    public function update(Request $request, $id)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
        ];
        try {
            $response = $this->client->post($this->api_service."/api/v1/user/$id", [
                'form_params' => $data
            ]);
            $res = json_decode($response->getBody());
            return redirect('/user');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }

    public function profile()
    {
        $id = get_user()->id;
        $response = $this->client->get($this->api_service."/api/v1/user/$id");
        $data = json_decode($response->getBody())->data;
        return view('pages.user.view', with(['data' => $data]));
    }
}
