<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function homepage(Request $request){
        $title = "Md Abul Bashar";
        $contactButton = true;
        $stack = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel'];
        return view('demo.index', 
        [
            'title' => $title, 
            'contactButton' => $contactButton,
            'stack' => $stack
        ]);
    }

    function submit(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $data = [
            "name" => $name,
            "email" => $email,
        ];
        return response($data);
    }

    function about(Request $request){
        return view('home.about');
    }
    function contact(Request $request){
        return view('home.contact');
    }
    function projects(Request $request){
        return view('home.projects');
    }
}
