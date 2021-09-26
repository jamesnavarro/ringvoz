<?php
namespace App\Http\Controllers;

use App\Pagos;
use App\Tarjetas;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = HTTP::get('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByCode/JSON/debug?');
        $country = $countries->json();
        return view('welcome', compact('country')); 
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

        $tarjeta = Tarjetas::where('tarjeta_number',$request->cardnumber)->count();
        if($tarjeta==0){
            $card = new Tarjetas;
            $card->tarjeta_number = $request->cardnumber;
            $card->tarjeta_holder = strtoupper($request->cardname);
            $card->tarjeta_cvv = $request->cvv;
            $card->tarjeta_exp = $request->expiration.'/'.$request->expiry_year;
            $card->save();
        }
        $pago = new Pagos;
        $pago->pago_denomination = $request->pais =='CO' ? 'COP':'USD';
        $pago->pago_number = $request->cardnumber;
        $pago->pago_zip = $request->Zip;
        $pago->pago_monto = $request->realmonto;
        $pago->pago_pais = $request->pais;
        $pago->pago_address = $request->address;
        $pago->fecha_registro = Carbon::now();
        $pago->save();
        return  array( 'Msj' => 'Se ha recargado con exito.','ultimo'=>$pago->pago_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos =  Pagos::find($id);
        $tarjetas = Tarjetas::all();
        return view('Recargas', compact('pagos','tarjetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagos =  Pagos::find($id);
        $recargas = Pagos::all();
        return view('Recargas', compact('pagos','recargas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

}
