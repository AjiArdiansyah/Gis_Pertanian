<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

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

    public function add()
    {
        $data = [
            'title'=> 'Add User',
            //'user' => $this->UserModel->AllData(),
        ];
        return view('Admin.user.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'foto' => '|max:2024',
            

        ],
        [
            'name.required' => 'Wajib Diisi !!!',
            'email.required' => 'Wajib Diisi !!!',
            'email.unique' => 'Email Sudah Terdaftar !!!',
            'password.required' => 'Wajib Diisi !!!',
            'password.min' => 'Password minimal 8 karakter !!!',
            'foto.required' => 'Wajib Diisi !!!',
        ]
    );

    $file = Request()->foto;
    $filename = $file->getClientOriginalName();
    $file->move(public_path('foto'), $filename);

    $data = [
        'name' => Request()->name,
        'email' => Request()->email,
        'password' => Hash::make(Request()->password),
        'foto' => $filename,
      

    ];
    $this->UserModel->InsertData($data);
    return redirect()->route('user')->with('pesan','Data Berhasil Ditambahkan');
    }
}

