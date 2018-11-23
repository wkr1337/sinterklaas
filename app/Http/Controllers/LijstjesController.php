<?php

namespace App\Http\Controllers;
use App\Lijstje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LijstjesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index() {
        $lijstjes = Lijstje::orderBy('created_at', 'desc')->paginate(10);
       
        // return view('lijstje.newIndex');
        return view('lijstje.index')->with('lijstjes', $lijstjes);
    }
    public function create() {
       
        return view('lijstje.create');
    }

    public function edit($id)
    {
        $lijstje = Lijstje::find($id);
        
        // Check for correct user
        if(auth()->user()->id !== $lijstje->user_id) {
            return redirect('/lijst')->with('error', 'Unauthorized page');
        }
        return view('lijstje.edit')->with('lijstje', $lijstje);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
         // create post
         $Lijstje = Lijstje::find($id);
         $Lijstje->title = $request->input('title');
         $Lijstje->body = $request->input('body');
         if($request->hasFile('cover_image')) {
             $Lijstje->cover_image = $fileNameToStore;
         }
         $Lijstje->save();
 
         return redirect('lijst')->with('success', 'Lijstje Updated');

    }


    public function store(Request $request) {
        // dd($request);
        


        $newLijst = new Lijstje;
        $newLijst->user_id = auth()->user()->id;
        $newLijst->title = $request->input('title');
        $newLijst->body = $request->input('body');
        $newLijst->save();



        // $response = array(
        //     'user_id' => auth()->user()->id,
        //     'title' => $request->title,
        //     'body' => $request->body
        // );

        // response()->json($response); 
        // LijstjesController::sendJson($request);
        $ajx = new AjaxController;
        $ajx->getAll();

        return redirect('lijst')->with('success', 'Lijstje created');

    }
    public function sendJson($request) {
        $response = array(
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body
        );
        echo json_encode($response);

        response()->json($response);
    }

    public function show($id) {
        $lijstje = Lijstje::find($id);
        return view('lijstje.show')->with('lijstje', $lijstje);
    }

    public function destroy($id) {

        $lijstje = Lijstje::find($id);

        // Check for correct user
        if(auth()->user()->id !== $lijstje->user_id) {
           return redirect('/posts')->with('error', 'Unauthorized page');
       }

       $lijstje->delete();
       return redirect('lijst')->with('success', 'Lijstje Removed');

    }


}
