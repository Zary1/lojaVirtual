<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Redis;

class Contactos extends Controller
{
    //
    public function main(){
        return view('layout.main');
    }
    public function sendContacto(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:register_admins',
            'phone' => 'required|string',
            'message' => 'required|string',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email deve ser válido.',
            'email.unique' => 'Este email já está em uso.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'message.required' => 'O campo senha é obrigatório.',
           
        ]);
        $sendMessage= new Contact();
        $sendMessage->name=$request->name;
        $sendMessage->email=$request->email;
        $sendMessage->phone=$request->phone;
        $sendMessage->message=$request->message;
        $sendMessage->save();
        return redirect('/main')->with('send','entraremos em contacto brevemente');
    }
}
