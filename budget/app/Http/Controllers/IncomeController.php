<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $response = $this->client->get($this->api_service."/api/v1/transaction?type=income");
        $data = json_decode($response->getBody())->data;
        return view('pages.income.list', with(['data' => $data]));
    }

    public function add()
    {
        $response = $this->client->get($this->api_service."/api/v1/category?type=income");
        $data_category = json_decode($response->getBody())->data;
        return view('pages.income.add', with(['data_category' => $data_category]));
    }

    public function store(Request $request)
    {
        $user = get_user();
        $data = [
            "user_id" => $user->id,
            "nominal" => $request->nominal,
            "category_id" => $request->category_id,
            "description" => $request->description,
        ];
        try {
            $response = $this->client->post($this->api_service."/api/v1/transaction", [
                'form_params' => $data
            ]);
            $res = json_decode($response->getBody());
            return redirect('/income');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }
}
