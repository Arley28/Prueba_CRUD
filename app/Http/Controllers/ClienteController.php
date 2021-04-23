<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra lista de clientes en la vista index
        $datos['clientes']=Cliente::paginate(5);
        return view("cliente.index", $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Devuelve la vista de la vista donde está el formurario para crear un nuevo cliente llamada create.blade
        return view("cliente.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validamos los campos que viene de la vista crear cliente llamada create.blade
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Telefono'=>'required|string|max:10'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //Recojemos los datos que vienen de la vista crear cliente y se le quita el token porque no lo necesitamos guardarlo en la BD
        $datosCliente = $request->except('_token');
        Cliente::insert($datosCliente);
        return redirect('cliente')->with('mensaje','Cliente agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Buscamos el cliente con su id para mostrar sus datos en la vista edit.blade
        $cliente=Cliente::findOrFail($id);
        return view("cliente.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validamos los datos que se van a actualizar para controlar los errores comunes
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Telefono'=>'required|string|max:10'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        //Traemos los datos que estan en la vista edit.blade con el parametro $id para poderlo actualizar si es necesario
        $datosCliente = $request->except(['_token','_method']);
        Cliente::where('id','=',$id)->update($datosCliente);
        $cliente=Cliente::findOrFail($id);
        return redirect('cliente')->with('mensaje','Cliente modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Borramos el cliente con el paraametro $id
        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje','Cliente borrado con éxito');
    }
}
