<?php

class Home extends Controller
{
    public function index($a = '', $b = '', $c = '')
    {
        // Instantiate the User model
        $model = new User();

        $arr['Felhasznalo_id'] = 1;


        $result =  $model -> where($arr);



        show($result[0]->Jog_id);

        
        // Load the view
        $this->view('home');
    }
}
