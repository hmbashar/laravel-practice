<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class DemoController extends Controller
{
    function me()
    {
        return response("Hello World");
    }

    function greet(Request $request, $name = "World")
    {
        return response("Greetings, " . $name . "!");
    }

    function person(Request $request)
    {
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

    function article(Request $request)
    {
        $article = Article::find(2);

        return $article;

        //return response($article);

    }

    function articles(Request $request)
    {
        $articles = Article::all();

        return $articles;

        //return response($article);

    }

    function demo()
    {
        // $result = DB::table('articles')->get(); // Get all articles
        // $result = DB::table('articles')->first(); // Get the first article
        // $result = DB::table('articles')->find(2); // Get article with ID 2
        // $result = DB::table('articles')->pluck('title'); // Get all titles
        //$result = DB::table('articles')->pluck('title', 'id'); // Get title and ID pairs


        //insert a new user
        // $result = DB::table('users')->insert(
        //     [
        //         'name' => 'John Doe',
        //         'email' => 'john.doe2@example.com',
        //         'password' => Hash::make('password123'),
        //         'remember_token' => '123456',
        //         'email_verified_at' => now(),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]
        // );

        $result = DB::table('users')->insert(
            [
                [ 'name' => 'John Doe', 'email' => 'john.doe3@example.com', 'password' => Hash::make('password123'),'remember_token' => '123456','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
                ,[ 'name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'password' => Hash::make('password123'),'remember_token' => '654321','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
                ,[ 'name' => 'Alice Johnson', 'email' => 'alice.j@example.com', 'password' => Hash::make('password123'),'remember_token' => 'abcdef','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
                ,[ 'name' => 'Bob Brown', 'email' => 'bob.brown@example.com', 'password' => Hash::make('password123'),'remember_token' => 'fedcba','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
            ]
        );

        return $result;
    }

}
