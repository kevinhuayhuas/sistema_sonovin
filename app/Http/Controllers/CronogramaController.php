<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Cronograma;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CronogramaController extends Controller
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
        //actualizar el estado segun la fecha de hoy
        $this->verificarFacturassVencidas();
        //consultar facturas vencidas
        $facturasVencias = $this->facturasVencidas();
        $facturasPagadas = $this->facturasPagadas();
        $facturasPorPagar = $this->facturasPorPagar();
        $cronogramas = DB::table('cronogramas')
        ->select('cronogramas.*', 'pagos.*')
        ->join('pagos', 'pagos.id', '=', 'cronogramas.gasto_id')
        ->orderBy('fecha_vencimiento','asc')->get();

        return view('cronograma', compact('cronogramas','facturasVencias','facturasPagadas','facturasPorPagar'));
    }

    public function verificarFacturassVencidas(){
        $hoy = new Carbon();
        DB::table('cronogramas')->where("fecha_vencimiento","<", $hoy->format('Y-m-d'))->where("estado","!=","1")->update(["estado"=>2]);
    }
    public function facturasVencidas(){
        $cronogramas = DB::table("cronogramas")
        ->where("estado","=","2")->count();
        return $cronogramas;
    }
    public function facturasPagadas(){
        $cronogramas = DB::table("cronogramas")
        ->where("estado","=","1")->count();
        return $cronogramas;
    }
    public function facturasPorPagar(){
        $cronogramas = DB::table("cronogramas")
        ->where("estado","=","0")->count();
        return $cronogramas;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function show(Cronograma $cronograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function edit(Cronograma $cronograma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cronograma $cronograma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cronograma  $cronograma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cronograma $cronograma)
    {
        //
    }
}
