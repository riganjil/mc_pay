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
        $user_id = $request->get('user_id');
        $type = $request->get('type');
        if ($type == "income"){
            $data = Transaction::selectRaw("transactions.*, name, description, type")->where("type", "income")
                ->join('categories', 'categories.id', 'transactions.category_id');
        }else if ($type == "expense"){
            $data = Transaction::selectRaw("transactions.*, name, description, type")->where("type", "expense")
                ->join('categories', 'categories.id', 'transactions.category_id');
        }else{
            $data = Transaction::selectRaw("transactions.*, name, description, type")->join('categories', 'categories.id', 'transactions.category_id');
        }
        if ($user_id){
            $this->data = $data->orderBy('transactions.id', 'desc')
                ->where("user_id", $user_id)
                ->get();
        }else{
            $this->data = $data->orderBy('transactions.id', 'desc')
                ->get();
        }
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

        $check = Category::where('id', $request->category_id)->first();
        $balance = User::where('id', $request->user_id)->first()->balance;
        $nominal = $request->nominal;
        if ($check->type == "income"){
            $total_balance = $balance + $nominal;
        }else{
            $total_balance = $balance - $nominal;
        }

        $data = [
            "user_id" => $request->user_id,
            "nominal" => $request->nominal,
            "old_balance" => $balance,
            "category_id" => $request->category_id,
            "description" => $request->description,
        ];
        $insert = Transaction::insert($data);
        $update = User::where('id', $request->user_id)->update(['balance' => $total_balance]);
        return $this->show_success("success");
    }

    public function total(Request $request)
    {
        $user_id = $request->user_id;

        $data_income = Transaction::selectRaw("sum(nominal) as total")
            ->join("categories", "categories.id", "transactions.category_id")
            ->where("user_id", $user_id)
            ->where("type", "income")
            ->first()->total;
        $data_expense = Transaction::selectRaw("sum(nominal) as total")
            ->join("categories", "categories.id", "transactions.category_id")
            ->where("user_id", $user_id)
            ->where("type", "expense")
            ->first()->total;
        $data_balance = User::where("id", $user_id)->first()->balance;

        $data = [
            "income" => $data_income,
            "expense" => $data_expense,
            "balance" => $data_balance,
        ];
        $this->data = $data;
        return $this->show_success("success");
    }
}
