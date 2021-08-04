<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();
        $this->data = $data;
        return $this->show_success("success");
    }

    public function edit($id)
    {
        $data = User::where("id", $id)->first();
        $this->data = $data;
        return $this->show_success("success");
    }

    public function store(Request $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ];
        $insert = User::insert($data);
        return $this->show_success("success");
    }

    public function update(Request $request)
    {
        $data = [
            "name" => $request->name,
            "email" => $request->email,
        ];
        $insert = User::where('id', $request->id)->update($data);
        return $this->show_success("success");
    }
}
