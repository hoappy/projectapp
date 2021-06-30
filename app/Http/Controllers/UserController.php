<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $datos['usarios']=User::paginate(5);
        return view('userList', $datos);

    }
    //
}
