<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Dominio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;


class DominioController extends Controller
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
        $this->actualizarEstadoDominio();

        $dominios = DB::table('dominios')
                    ->select('dominios.*','dominios.id AS id_dominio', 'clientes.*')
                    ->join('clientes', 'clientes.id', '=', 'dominios.cliente_id')
                    //->where('clientes.nombre', '=', 'grimaldo')
                    ->orderBy('expira','desc')->get();
        $clientes = DB::table('clientes')->get();
        $arrayDominios=$dominios;
        //capturar la fecha actual
        $fecha=Carbon::now();
        //darle formato a la fecha
        $hoy=$fecha->format('Y-m-d');
        //crear una coleccion o array
        $dominiosPorVencer=collect();
        //recorrer los dominios
        foreach($arrayDominios as $dominio){
            //calcular los dias que falten para vencer
            $fechaExpiracion = Carbon::parse($dominio->expira);
            $diasDiferencia = $fechaExpiracion->diffInDays($hoy);
            //agregamos el valor de los dias que faltan por vencer
            $dominio->dias_restantes=$diasDiferencia;
            if($diasDiferencia<=7){
                $dominiosPorVencer->push($dominio);
            }
        }
        return view('dominio', compact('arrayDominios','dominiosPorVencer','clientes'));
    }

    public function actualizarEstadoDominio(){
        $hoy = new Carbon();
        DB::table('dominios')->where("expira","<", $hoy->format('Y-m-d'))->update(["estado"=>2]);
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
            'txtCliente' => 'required',
            'txtDominio' => 'required'
        ]);

        $dominio = new Dominio;
        $dominio->cliente_id = $request->input('txtCliente');
        $dominio->nombre_dominio = $request->input('txtDominio');
        $dominio->registro = $request->input('txtRegistro');
        $dominio->actualizacion = $request->input('txtActualizacion');
        $dominio->expira = $request->input('txtExpira');
        $dominio->estado = $request->input('txtEstado');
        $dominio->save();
        $dominios= DB::table("dominios")->select('dominios.*')->get();
        //return redirec por name en rutas web 
        return redirect()->route("dominios",compact("dominios"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = DB::table('clientes')->get();
        $dominio= DB::table("dominios")->select('dominios.*','dominios.id AS id_dominio')->find($id);
        return view('detalleDominio',compact("dominio","clientes"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = DB::table('clientes')->get();
        $dominio= DB::table("dominios")->select('dominios.*','dominios.id AS id_dominio')->find($id);
        return view('editarDominio',compact("dominio","clientes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dominio=Pago::find($id);

        $dominio ->cliente_id =$request->input('txtCliente');
        $dominio->nombre_dominio=$request->input('txtDominio');
        $dominio->registro=$request->input('txtRegistro');
        $dominio->actualizacion=$request->input('txtActualizacion');
        $dominio->expira=$request->input('txtExpira');
        $dominio->estado=$request->input('txtEstado');

        $dominio->update();

        $dominios= DB::table("dominios")->select('dominios.*')->get();
        return redirect()->route("dominios",compact("dominios"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dominio  $dominio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dominio = Dominio::find($id); 
        $dominio->delete();
        $dominios= DB::table("dominios")->select('dominios.*')->get();
        return redirect()->route("dominios",compact("dominios"));
    }
}
