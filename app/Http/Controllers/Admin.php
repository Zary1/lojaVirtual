<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function index(){
        return view('administradores.allProdutos');
    }
    public function showRegistro(){
        return view('administradores.registro');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|string|email|unique:register_admins',
            'phone' => 'required|string',
            'password' => 'required|string|confirmed|regex:/^[\d+]+$/',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.unique' => 'Este email já está em uso.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);
        
        
      
         $admin= new RegisterAdmin();
         $admin->nome=$request->nome;
         $admin->email=$request->email;
         $admin->phone=$request->phone;
         $admin->password=$request->password;
         $admin->password=Hash::make($request->password);
         $admin->save();
        return view('administradores.loginAdmin');
    }


    // login
    public function showLogin(){
        return view('administradores.loginAdmin');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
        ], 
        [  
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ]);
        $credenias=$request->only('email','password');
        if(Auth::guard('admin')->attempt($credenias)){
            return redirect('allAdmin');

        }
        return redirect()->back()->with('msg','email ou senha inválida');


    }

    // show all admins
    public function showAdmins(){
        $admins= RegisterAdmin::all();
        return view('administradores.allAdmin',['admins'=> $admins]);
    }
    public function destroy($id){
        $admins=RegisterAdmin::findOrFail($id);
        $admins->delete();
        return redirect('allAdmin');

    }
    public function showEdit($id){
        $admin=RegisterAdmin::findOrFail($id);
        return view('administradores.editAdmin',['admin'=> $admin]);
    }
    public function storeEdit(Request $request,$id){
        $data=$request->all();
        RegisterAdmin::findOrFail($id)->update($data);
        return redirect('allAdmin');

    }


    // logout
    public function logoutAdmin(){
        Auth::guard('admin')->logout();
        return redirect('loginAdmin');
    }
}
