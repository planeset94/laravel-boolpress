<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
public function contact(){
    
return view('general.contact');
    
}


public function sendForm(Request $request){

    ddd($request->all());
}


}