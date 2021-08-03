<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $response = $this->client->get($this->api_service."/api/v1/transaction");
        $data = json_decode($response->getBody())->data;
        return view('pages.transaction.list', with(['data' => $data]));
    }

    public function add()
    {
        return view('pages.transaction.add');
    }
}
