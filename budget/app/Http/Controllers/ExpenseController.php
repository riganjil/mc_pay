<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $response = $this->client->get($this->api_service."/api/v1/transaction?type=expense");
        $data = json_decode($response->getBody())->data;
        return view('pages.expense.list', with(['data' => $data]));
    }

    public function add()
    {
        $response = $this->client->get($this->api_service."/api/v1/category?type=expense");
        $data_category = json_decode($response->getBody())->data;
        return view('pages.expense.add', with(['data_category' => $data_category]));
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
            return redirect('/expense');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }
}

