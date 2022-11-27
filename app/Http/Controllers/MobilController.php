<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return response()->json([
            'status' => '200',
            'message' => 'data succesfully sent',
            'data' => $mobil
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mobil = Mobil::create([
            'nama_mobil' => $request->nama_mobil,
            'merk_mobil' => $request->merk_mobil,
            'jumlah_seat' => $request->jumlah_seat,
            'plat_nomor' => $request->plat_nomor,
            'harga_sewa' => $request->harga_sewa
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $mobil
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::find($id);
        if($mobil){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil ditampilkan',
                'data' => $mobil
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
        }
        
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
        $mobil = Mobil::find($id);
        if($mobil){
            $mobil->nama_mobil = $request->nama_mobil ? $request->nama_mobil : $mobil->nama_mobil;
            $mobil->merk_mobil = $request->merk_mobil ? $request->merk_mobil : $mobil->merk_mobil;
            $mobil->jumlah_seat = $request->jumlah_seat ? $request->jumlah_seat : $mobil->jumlah_seat;
            $mobil->plat_nomor = $request->plat_nomor ? $request->plat_nomor : $mobil->plat_nomor;
            $mobil->harga_sewa = $request->harga_sewa ? $request->harga_sewa : $mobil->harga_sewa;
            $mobil->save();
            return response()->json([
                'status' => 200,
                'data' => $mobil
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $mobil . 'tidak di temukan'
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
        $mobil = Mobil::where('id',$id)->first();
        if($mobil){
            $mobil->delete();
            return response()->json([
                'status' => 200,
                'data' => $mobil
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak di temukan'
            ],404);
        };
    }
}