<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
class PagoController extends Controller
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
        $pagos= DB::table("pagos")->select('pagos.*')->get();
        return view('pago',compact("pagos"));
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
            'txtEntidad' => 'required',
            'txtCodigo' => 'required'
        ]);

        $pago = new Pago;
        $pago->nombre_pago = $request->input('txtNombre');
        $pago->detalle_pago = $request->input('txtDetalle');
        $pago->entidad = $request->input('txtEntidad');
        $pago->codigo_pago = $request->input('txtCodigo');
        $pago->save();
        $pagos= DB::table("pagos")->select('pagos.*')->get();
        //return redirec por name en rutas web 
        return redirect()->route("pagos",compact("pagos"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago= DB::table("pagos")->find($id);
        return view('detallePago',compact("pago"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago= DB::table("pagos")->find($id);
        return view('editarPago',compact("pago"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pago=Pago::find($id);

        $pago ->nombre_pago =$request->input('txtNombre');
        $pago->detalle_pago=$request->input('txtDetalle');
        $pago->entidad=$request->input('txtEntidad');
        $pago->codigo_pago=$request->input('txtCodigo');

        $pago->update();

        $pagos= DB::table("pagos")->select('pagos.*')->get();
        return redirect()->route("pagos",compact("pagos"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago = Pago::find($id); 
        $pago->delete();
        $pagos= DB::table("pagos")->select('pagos.*')->get();
        return redirect()->route("pagos",compact("pagos"));
    }
}
