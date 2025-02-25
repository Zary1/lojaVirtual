@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">
    <div class="w-full max-w-5xl overflow-x-auto">
        <table class="w-full border-collapse bg-white shadow-lg rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white text-left">
                    <th class="p-3">Nome</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Telefone</th>
                    <th class="p-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-3">{{$admin->nome}}</td>
                    <td class="p-3">{{$admin->email}}</td>
                    <td class="p-3">{{$admin->phone}}</td>
                    
                    <td class="p-3 flex">
                        <a href="/edit/allAdmin/{{$admin->id}}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600
                         transition">Editar</a>
                        <form action="/delete/{{$admin->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1
                         rounded hover:bg-red-600 transition ml-2">Excluir</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>


@endsection