<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $response = $this->client->get($this->api_service."/api/v1/category");
        $data = json_decode($response->getBody())->data;
        return view('pages.category.list', with(['data' => $data]));
    }

    public function add()
    {
        return view('pages.category.add');
    }

    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "type" => $request->type,
        ];
        try {
            $response = $this->client->post($this->api_service."/api/v1/category", [
                'form_params' => $data
            ]);
            $res = json_decode($response->getBody());
            return redirect('/category');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }
}
