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
        return view('pages.expense.add');
    }
}
