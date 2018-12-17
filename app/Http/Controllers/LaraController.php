<?php

namespace App\Http\Controllers;

use App\Lara;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Verify the specified resource.
     *
     * @param  \App\Lara  $lara
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, Lara $lara)
    {
        $record = $request->input('record'); 
        $lara = Lara::where('record_number', '=', $record)->first();
        if ($lara === null) {
            // record doesn't exist
            return response()->json(['errors'=>"The information you entered does not match our state licensed database, please try again."],422);
        } else {
            $laraIsNotClaimed = Lara::where('record_number', '=', $record)
                        ->where('claimed','=',0)
                        ->first();
                if ($laraIsNotClaimed === null) {
                    // record doesn't exist
                    return response()->json(['warning'=>"We have already registred this business. Please wait for Beta!"],201);
                } else {
                    $user = new User();
                    $user->name = "unkown";
                    $user->email = $request->input('email');
                    $user->password= "randomstringgggg123";
                    $user->phone = $request->input('phone');
                    $user->save();

                    $laraIsNotClaimed->claimed = 1;
                    $laraIsNotClaimed->user_id = $user['id'];
                    $laraIsNotClaimed->save();
                    return response()->json(['success'=>"We have signed you up for Beta!"],201);
                }
        }
/*
        $lara = Lara::where('record_number', '=', $record)->first();
            if ($lara === null) {
                // record doesn't exist
                return response()->json(['errors'=>"The information you entered does not match our state licensed database, please try again."],422);
            } elseif (x) {
                return response()->json(['success'=>"We have signed you up for Beta!"],201);
            }
            */
    }

    public function businessName(Request $request, Lara $lara)
    {
        $query = Input::get('name');
        $lara = Lara::where('licensee_name','like','%'.$query.'%')->get();
        return response()->json($lara);
    }
}
