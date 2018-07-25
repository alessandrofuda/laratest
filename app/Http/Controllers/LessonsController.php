<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function index(){
    	return 'Normal lesson (only for payer subscribers)';
    }


    public function premium(){
    	return 'Premium lessons';
    }
}
