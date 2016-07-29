<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TheatreRequest;

class TheatreController extends Controller
{
    public function index () {
        $model = \App\Theatre::orderby('created_at', 'asc')->get();
        
        return view('theatres', [
            'theatres' => $model,
        ]);
    }
    
    public function store (TheatreRequest $request) {
        $model = new \App\Theatre;
        $model->name = $request->get('name');
        $model->save();
        
        return redirect()->to('/theatre');
    }
}
