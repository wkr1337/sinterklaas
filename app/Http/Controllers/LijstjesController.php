<?php

namespace App\Http\Controllers;
use App\Lijstje;
use Illuminate\Http\Request;

class LijstjesController extends Controller
{
    public function index() {
        return view('index');
    }
    public function create() {
        return view('createList');
    }

    public function store($id) {

    }
}
