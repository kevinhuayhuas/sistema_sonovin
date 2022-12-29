<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     * Aqui pedimos que el usuario este logeado para ingresar al sistema 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table('clientes')->get();
        $arrayClientes=$clientes;
        return view('cliente', compact('arrayClientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'txtNombre' => 'required',
            'txtApellidos' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nombre = $request->input('txtNombre');
        $cliente->apellidos = $request->input('txtApellidos');
        $cliente->empresa = $request->input('txtEmpresa');
        $cliente->dni = $request->input('txtDni');
        $cliente->ruc = $request->input('txtRuc');
        $cliente->correo = $request->input('txtCorreo');
        $cliente->telefono = $request->input('txtTelefono');
        $cliente->celular = $request->input('txtCelular');
        $cliente->web = $request->input('txtWeb');
        $cliente->distrito = $request->input('txtDistrito');
        $cliente->departamento = $request->input('txtDepartamento');
        $cliente->direccion = $request->input('txtDireccion');
        $cliente->inmueble = $request->input('txtInmueble');
        $cliente->save();
        $clientes= DB::table("clientes")->select('clientes.*')->get();
        //return redirec por name en rutas web 
        return redirect()->route("clientes",compact("clientes"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $cliente= DB::table("clientes")->find($id);
        return view('detalleCliente',compact("cliente"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente= DB::table("clientes")->find($id);
        return view('editarCliente',compact("cliente"));
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
        $cliente=Cliente::find($id);

        $cliente->nombre = $request->input('txtNombre');
        $cliente->apellidos = $request->input('txtApellidos');
        $cliente->empresa = $request->input('txtEmpresa');
        $cliente->dni = $request->input('txtDni');
        $cliente->ruc = $request->input('txtRuc');
        $cliente->correo = $request->input('txtCorreo');
        $cliente->telefono = $request->input('txtTelefono');
        $cliente->celular = $request->input('txtCelular');
        $cliente->web = $request->input('txtWeb');
        $cliente->distrito = $request->input('txtDistrito');
        $cliente->departamento = $request->input('txtDepartamento');
        $cliente->direccion = $request->input('txtDireccion');
        $cliente->inmueble = $request->input('txtInmueble');

        $cliente->update();

        $clientes= DB::table("clientes")->select('clientes.*')->get();
        return redirect()->route("clientes",compact("clientes"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id); 
        $cliente->delete();
        $clientes= DB::table("clientes")->select('clientes.*')->get();
        return redirect()->route("clientes",compact("clientes"));
    }
}
