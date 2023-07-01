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

    public function edit($id)
    {
        $data = [
            'title'=> 'Edit User',
            'user' => $this->UserModel->DetailData($id),
            
        ];
        return view('Admin.user.v_edit', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            //'foto' => '|max:2024',
           

        ],
        [
            'name.required' => 'Wajib Diisi !!!',
            //'email.required' => 'Wajib Diisi !!!',
            //'email.unique' => 'Email Sudah Terdaftar !!!',
            'password.required' => 'Wajib Diisi !!!',
            'password.min' => 'Password minimal 8 karakter !!!',
            //'foto.required' => 'Wajib Diisi !!!',
            
           
        ]
    );

    if (Request() ->foto <> ""){
        //hapus foto lama
        $user = $this->UserModel->DetailData($id);
        if($user->foto <> ""){
            unlink(public_path('foto') . '/' . $user->foto);
        }

        //jika ingin ganti gambar
        $file = Request()->foto;
        $filename = $file->GetClientOriginalExtension();
        $file->move(public_path('foto'), $filename);

        $data = [
            'name' => Request()->name,
            //'password' => Request()->password,
            'foto' => $filename,
            
    
        ];
        $this->UserModel->UpdateData($id, $data);
        
    } else {
        $data = [
            'name' => Request()->name,
            //'password' => Request()->password,
               
        ];
        $this->UserModel->UpdateData($id, $data);
    }
    $this->UserModel->UpdateData($id, $data);
    return redirect()->route('user')->with('pesan', 'Data berhasil di Update.!!!');

   
    
    //return redirect()->route('user')->with('pesan','Data Berhasil Update');
    }

    public function delete($id)
    {
        //hapus data gambar
        $user = $this->UserModel->DetailData($id);
        if ($user->foto <> "") {
            unlink(public_path('foto') . '/' . $user->foto);
        }

        $this->UserModel->DeleteData($id);
    return redirect()->route('user')->with('pesan','Data Berhasil Delete');
    }
}

