<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');
        if ($type == "income"){
            $data = Transaction::where("type", "income")
                ->join('categories', 'categories.id', 'transactions.category_id')
                ->get();
        }else if ($type == "expense"){
            $data = Transaction::where("type", "expense")
                ->join('categories', 'categories.id', 'transactions.category_id')
                ->get();
        }else{
            $data = Transaction::join('categories', 'categories.id', 'transactions.category_id')
                ->get();
        }
        $this->data = $data;
        return $this->show_success("success");
    }

    public function edit($id)
    {
        $data = Transaction::where("id", $id)->first();
        $this->data = $data;
        return $this->show_success("success");
    }

    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'type' => 'required|in:income,expense'
//        ]);
//
//        if ($validator->fails()) {
//            $data = $validator->errors();
//            return $this->show_error("error", 400);
//        }

        $check = Category::where('category_id', $request->category_id)->first();
        $balance = User::where('id', $request->user_id)->first()->balance;
        $nominal = $request->nominal;
        if ($check->type == "income"){
            $total_balance = $balance + $nominal;
        }else{
            $total_balance = $balance - $nominal;
        }

        $data = [
            "nominal" => $request->nominal,
            "category_id" => $request->category_id,
            "description" => $request->description,
        ];
        $insert = Transaction::insert($data);
        return $this->show_success("success");
    }
}
