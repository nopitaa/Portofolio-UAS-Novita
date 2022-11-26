<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formulir;
use App\Models\Motor;
use Auth;
class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulir = formulir::all();

        return response()->json([
            "message" => "Load Data Berhasil",
            "data" => $formulir
        ], 200);
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
        $user_id = Auth::id();
        $user_email = Auth::user()->email;
        $user_name = Auth::user()->name;
        $user_noktp = Auth::user()->no_ktp;
        $user_nohp = Auth::user()->no_hp;

        $id_motor = $request->id_motor;
        $nama_motor = Motor::where('id', $id_motor)->value('nama_motor');

        $table = formulir::create([
            "id_motor" => $id_motor,
            "nama" => $user_name,
            "email" => $user_email,
            "no_hp" => $user_nohp,
            "no_ktp" => $user_noktp,
            "tanggal_sewa" => $request->tanggal_sewa,
            "lokasi_pengantaran" => $request->lokasi_pengantaran,
            "lokasi_pengembalian" => $request->lokasi_pengembalian,
            "nama_motor" => $nama_motor,

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
        $formulir = formulir::find($id);
        if ($formulir) {
            return response()->json([
                'status' =>200,
                'data' => $formulir
            ], 200);
        } else {
            return response()->json([
                'status' =>404,
                'message' => 'id atas ' .$id. ' tidak ditemukan'
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
        $formulir = formulir::find($id);
        if($formulir){
            $formulir->nama = $request->nama ? $request->nama :$formulir->nama;
            $formulir->email = $request->email ? $request->email :$formulir->email;
            $formulir->no_hp = $request->no_hp ? $request->no_hp :$formulir->no_hp;
            $formulir->no_ktp = $request->no_ktp ? $request->no_ktp :$formulir->no_ktp;
            $formulir->tanggal_sewa = $request->tanggal_sewa ? $request->tanggal_sewa :$formulir->tanggal_sewa;
            $formulir->lokasi_pengantaran = $request->lokasi_pengantaran ? $request->lokasi_pengantaran :$formulir->lokasi_pengantaran;
            $formulir->lokasi_pengembalian = $request->lokasi_pengembalian ? $request->lokasi_pengembalian :$formulir->lokasi_pengembalian;
            $formulir->save();
            return response()->json([
                'status' =>200,
                'data' => $formulir
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
        $formulir = formulir::where('id', $id)->first();
        if($formulir){
            $formulir->delete();
            return response()->json([
                'status'=>200,
                'message'=>'data been deleted'
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> 'id' .$id. 'tidak ditemukan'
            ],404);
        }
    }
}
