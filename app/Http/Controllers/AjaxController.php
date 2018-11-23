<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lijstje;

class AjaxController extends Controller
{
    public function index() {
        return view('ajax');
    }
    public function post(Request $request){
        $response = array(
            'status' => 'success',
            'title' => $request->title,
            'body' => $request->body
        );
        return response()->json($response); 
    }

    public function getAll() {
        $lijstjes = Lijstje::orderBy('created_at', 'desc')->paginate(10);

        $response = array(
            'lijstjes' =>  $lijstjes
        );
        
        return response()->json($response); 
        
    }
}
