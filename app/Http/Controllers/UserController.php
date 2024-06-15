<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $var = 1;
        $arr = range(1, 100);
        return view("welcome", ["var" => $var, "arr" => $arr]);
    }

    public function show($id = null) {
        $search = request('search');
        return view("Products", ["id" => $id, "search" => $search]);
    }

    public function request() {
        $search = request('search');
        return view('Products', ['search' => $search]);
    }
}
