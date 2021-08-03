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
        return view('pages.income.add');
    }
}
