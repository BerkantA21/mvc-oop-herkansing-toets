<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = 
        [
                'title' => 'Homepage MVC-toets',
                'sayHello' => 'Hallo Allemaal'
        ];
        $this ->view('landingpages/index', $data);
    }
}