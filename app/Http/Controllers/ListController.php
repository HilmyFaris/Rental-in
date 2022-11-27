<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListRental;
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ListRental::all();
        return response()->json([
            'status' => '200',
            'message' => 'data succesfully sent',
            'data' => $list
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
        $list = ListRental::create([
            'nama_peminjam' => $request->nama_peminjam,
            'no_hp' => $request->no_hp,
            'mobil_pinjam' => $request->mobil_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_bayar' => $request->total_bayar
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $list
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
        $list = ListRental::find($id);
        if($list){
            return response()->json([
                'status' => 200,
                'message' => 'data berhasil ditampilkan',
                'data' => $list
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
        $list = ListRental::find($id);
        if($list){
            $list->nama_peminjam = $request->nama_peminjam ? $request->nama_peminjam : $list->nama_peminjam;
            $list->no_hp = $request->no_hp ? $request->no_hp : $list->no_hp;
            $list->mobil_pinjam = $request->mobil_pinjam ? $request->mobil_pinjam : $list->mobil_pinjam;
            $list->tanggal_pinjam = $request->tanggal_pinjam ? $request->tanggal_pinjam : $list->tanggal_pinjam;
            $list->tanggal_kembali = $request->tanggal_kembali ? $request->tanggal_kembali : $list->tanggal_kembali;
            $list->total_bayar = $request->total_bayar ? $request->total_bayar : $list->total_bayar;
            $list->save();
            return response()->json([
                'status' => 200,
                'data' => $list
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $list . 'tidak di temukan'
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
        $list = ListRental::where('id',$id)->first();
        if($list){
            $list->delete();
            return response()->json([
                'status' => 200,
                'data' => $list
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak di temukan'
            ],404);
        };
    }
}