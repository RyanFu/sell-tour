<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index(){
    	return view('backend.tour.index');
    }

    public function show($id){
    	return view('backend.tour.show');
    }

    public function create(){	
    	return view('backend.tour.create');
    }

    public function store(Request $request){

    }

    public function edit($id){
    	return view('backend.tour.edit');
    }

    public function update($id, Request $request){

    }

    public function delete($id){

    }
}
