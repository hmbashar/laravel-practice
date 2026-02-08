<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DemoController extends Controller
{
    function me() {
        return response("Hello World");
    }

    function greet(Request $request, $name = "World"){
        return response("Greetings, " . $name . "!");
    }

    function person (Request $request){
        $person = [
            // "name" => $request->input('name'),
            // "age" => $request->input('age'),
            // "email" => $request->input('email'),
            // "phone" => $request->input('phone'),
            "name" => "John Doe",
            "age" => 30,
            "email" => "john.doe@example.com",
            "phone" => "123-456-7890",
        ];
        return response($person);
    }

    function article(Request $request){
        $article = Article::find(2);

        return $article;

        //return response($article);

    }

    function articles(Request $request){
        $articles = Article::all();

        return $articles;

        //return response($article);

    }

}
