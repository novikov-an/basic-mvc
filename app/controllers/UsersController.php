<?php
namespace App\Controllers;
use App\Core\App;

class UsersController
{
    public function index()
    {
        $users = App::get('database')->SelectAll('Users');
        return view('users', compact('users') );
    }

    public function add()
    {
        $name = $_POST['name'];

        App::get('database')->insert('users', [
            'Name' => $name,
        ]);

        return redirect('users');
    }
}