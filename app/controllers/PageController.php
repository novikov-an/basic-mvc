<?php
namespace App\Controllers;

class PageController
{
    /**
     * Home page
     * @return mixed
     */
    public function home()
    {
        return view('index', compact('users'));
    }
    
    /**
     * About page
     * @return mixed
     */
    public function about()
    {
        return view('about');
    }
    
    /**
     *
     * @return mixed
     */
    public function contact()
    {
        return view('contact');
    }
}