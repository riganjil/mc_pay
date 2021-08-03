<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        $this->data = $data;
        return $this->show_success("success");
    }

    public function edit($id)
    {
        $data = Category::where("id", $id)->first();
        $this->data = $data;
        return $this->show_success("success");
    }

    public function delete($id)
    {
        $data = Category::where('id', $id)->delete();
        return $this->show_success("success");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:income,expense'
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return $this->show_error("error", 400);
        }

        $data = [
            "name" => $request->name,
            "type" => $request->type,
        ];
        $insert = Category::insert($data);
        return $this->show_success("success");
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:income,expense'
        ]);

        if ($validator->fails()) {
            $data = $validator->errors();
            return $this->show_error("error", 400);
        }

        $data = [
            "name" => $request->name,
            "type" => $request->type,
        ];
        $insert = Category::where('id', $request->id)->update($data);
        return $this->show_success("success");
    }
}
