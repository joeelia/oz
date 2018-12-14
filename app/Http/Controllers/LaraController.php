<?php

namespace App\Http\Controllers;

use App\Lara;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xml=simplexml_load_file(asset('storage/array.xml')) or die("Error: Cannot create object");
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$mmfs = $array['Document']['Folder']['Placemark'];



$mmfs = $array['Document']['Folder']['Placemark'];




foreach ($mmfs as $mmf)
{
echo '<br>';
echo '<br>';
echo print_r($mmf['name'],true);
echo '<br>';
echo print_r($mmf['address'],true);
echo '<br>';
echo print_r($mmf['ExtendedData']['Data'][0]['value'],true);
echo '<br>';
echo print_r($mmf['ExtendedData']['Data'][1]['value'],true);
echo '<br>';
echo print_r($mmf['ExtendedData']['Data'][2]['value'],true);
echo '<br>';
echo print_r($mmf['ExtendedData']['Data'][3]['value'],true);
echo '<br>';
echo print_r($mmf['ExtendedData']['Data'][4]['value'],true);
echo '<br>';

$lara = new Lara();
//On left field name in DB and on right field name in Form/view

$lara->licensee_name = $mmf['name'];
$lara->record_number= $mmf['ExtendedData']['Data'][0]['value'];
$lara->record_type = $mmf['ExtendedData']['Data'][1]['value'];
$lara->address= $mmf['address'];
$lara->expiration_date = Carbon::createFromFormat('d/m/Y', $mmf['ExtendedData']['Data'][3]['value']);
$lara->status= "1";
$lara->claimed = "0";
$lara->save();


}
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
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function show(Lara $lara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function edit(Lara $lara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lara $lara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lara $lara)
    {
        //
    }
}
