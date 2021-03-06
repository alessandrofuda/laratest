<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Resources\UserResource;


class UsersController extends Controller
{
    public function index(){

    	return UserResource::collection(User::paginate(6));  // return json from an array..

    }



}
