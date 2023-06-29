<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title'=> 'User',
            'user' => $this->UserModel->AllData(),
        ];
        return view('Admin.user.v_index', $data);
    }
}
