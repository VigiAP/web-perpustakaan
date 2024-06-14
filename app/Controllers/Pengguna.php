<?php

namespace App\Controllers;

class Pengguna extends BaseController
{
    public function index()
    {
        $data =[
            'title'=>'Dashboard',
        ];
        
        return view('dashboard/index', $data);
    }
}
