<?php

class HomeController extends Controller
{
    public function __construct()
    {
        $this->isLoggedIn();
    }


    public function index()
    {

        $this->View('home');
    }


}