<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;



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

        // $result = DB::table('users')->insert(
        //     [
        //         [ 'name' => 'John Doe', 'email' => 'john.doe3@example.com', 'password' => Hash::make('password123'),'remember_token' => '123456','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
        //         ,[ 'name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'password' => Hash::make('password123'),'remember_token' => '654321','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
        //         ,[ 'name' => 'Alice Johnson', 'email' => 'alice.j@example.com', 'password' => Hash::make('password123'),'remember_token' => 'abcdef','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
        //         ,[ 'name' => 'Bob Brown', 'email' => 'bob.brown@example.com', 'password' => Hash::make('password123'),'remember_token' => 'fedcba','email_verified_at' => now(), 'created_at' => now(),'updated_at' => now() ]
        //     ]
        // );

        $result = DB::table('users')->get();

        return $result;
    }

    function index(Request $request)
    {
        $users = User::all();

        $count = $users->count();

        return response()->json($users, 200, ['count' => $count]);
    }

    function profileEntry() {
        // $profile = new Profile();
        // $profile->bio= "Hello this is a Bio";
        // $profile->user_id = 1;
        // $profile->name ="Bashar";
        // $profile->email = "test@gmail.com";
        // $profile->phone = "123456789";
        // $profile->save();

        $profile = Profile::create(
            [
                'bio' => 'Hello this is a Bio',
                'user_id' => 1,
                'name' => 'Bashar',
                'email' => 'test2@gmail.com',
                'phone' => '1234567890',
            ]
        );

        return $profile;
    }

    function updateProfile(Request $request) {
        $profile = Profile::find(1);

        $profile->update(
            [
                'bio' => 'Hello this is a Bio updated',
                'name' => 'Bashar updated',
                'email' => 'test2updated@gmail.com',
                'phone' => '1234567890updated',
            ]
        );

        return $profile;
    }
}
