<?php

namespace Modules\Pemilih\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Pemilih\Entities\PemilihModel;
use Illuminate\Support\Facades\Validator;

class PemilihApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = DB::table('pemilih')->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('pemilih::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function validasi(Request $request){
        $cari = $request->get('query');

            $data = PemilihModel::where('nik', 'like', '%' .  $cari . '%')->first();
            if ($data) {
                return $data;
            } else { }


    }
    public function store(Request $request)
    {

        $pemilih = new PemilihModel();
        $pemilih->nik = $request->nik;
        $pemilih->nama = $request->nama;
        $pemilih->jenis_kelamin = $request->jenis_kelamin;
        $pemilih->status_vote = $request->statusvote;
        $pemilih->save();




    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $pemilih = PemilihModel::find($id);
        return $pemilih;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('pemilih::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $pemilih = PemilihModel::find($id);
        $pemilih->nik = $request->nik;
        $pemilih->nama = $request->nama;
        $pemilih->jenis_kelamin = $request->jenis_kelamin;
        $pemilih->save();


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $pemilih = PemilihModel::find($id);
        $pemilih->delete();
    }
}
