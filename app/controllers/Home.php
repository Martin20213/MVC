<?php

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        // Instantiate the User model
        $model = new User();

        

        // Load the view
        $this->view('home');
    }
}
