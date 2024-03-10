<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view ("test");
       
    }
    public function create(){
        return view ("test.create");
        
    }
    public function store(){ //store in database
        
    }
    public function edit(){
        return view ("test.edit");
    }
    public function update(){
        
    }

}
