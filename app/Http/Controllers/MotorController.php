<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Motor::all();
        return $motor;

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
        $table = Motor::create([
            "nama_motor" => $request->nama_motor,
            "warna" => $request->warna,
            "merek" => $request->merek,
            "tahun_pembuatan" => $request->tahun_pembuatan,
            "status" => $request->status,
            "harga" => $request->harga,
        ]);

        return response()->json([
            'success' =>201,
            'message' => 'data berhasil disimpan',
            'data' => $table

        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motor = motor::find($id);
        if ($motor) {
            return response()->json([
                'status' =>200,
                'data' => $motor
            ], 200);
        } else {
            return response()->json([
                'status' =>404,
                'message' => 'id atas' .$id. 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $motor = motor::find($id);
        if($motor){
            $motor->nama_motor = $request->nama_motor ? $request->nama_motor :$motor->nama_motor;
            $motor->warna = $request->warna ? $request->warna :$motor->warna;
            $motor->merek = $request->merek ? $request->merek :$motor->merek;
            $motor->tahun_pembuatan = $request->tahun_pembuatan ? $request->tahun_pembuatan :$motor->tahun_pembuatan;
            $motor->status = $request->status ? $request->status :$motor->status;
            $motor->harga = $request->harga ? $request->harga :$motor->harga;
            $motor->save();
            return response()->json([
                'status' =>200,
                'data' => $motor
            ],200);
        }else{
            return response()->json([
                'status' =>404,
                'message' =>'id ' .$id . ' tidak ditemukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = motor::where('id', $id)->first();
        if($motor){
            $motor->delete();
            return response()->json([
                'status'=>200,
                'data'=>$motor
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' .$id. 'tidak ditemukan'
            ],404);
        }
    }
}
