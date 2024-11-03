<?php

class Export extends Controller
{

    public function index($a = '', $b = '', $c = '')
    {
        echo "Export kontroller";

        $this->view('export');
    }


}

