<?php

namespace Modules\Datapemilih\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Datapemilih\Entities\DataPemilihModel;
use Illuminate\Support\Facades\DB;

class DataPemilihApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = DB::table('calon')->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('datapemilih::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $datapemilihObject = new DataPemilihModel();
        $datapemilihObject->nama = $request->nama;
        $datapemilihObject->email = $request->email;
        $datapemilihObject->jenis_kelamin = $request->jenis_kelamin;
        $datapemilihObject->alamat = $request->alamat;
        $datapemilihObject->nomor_telepon = $request->nomor_telepon;
        $datapemilihObject->foto = 'calongambar/' . $foto->getClientOriginalName();
        $datapemilihObject->visi = $request->visi;
        $datapemilihObject->misi = $request->misi;
        $datapemilihObject->save();
        $path = $request->foto->storeAs('calongambar', $foto->getClientOriginalName());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $datapemilih = DataPemilihModel::find($id);
        return $datapemilih;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('datapemilih::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $datapemilihObject = DataPemilihModel::find($id);
            $datapemilihObject->nama = $request->nama;
            $datapemilihObject->email = $request->email;
            $datapemilihObject->jenis_kelamin = $request->jenis_kelamin;
            $datapemilihObject->alamat = $request->alamat;
            $datapemilihObject->nomor_telepon = $request->nomor_telepon;
            $datapemilihObject->foto = 'calongambar/' . $foto->getClientOriginalName();
            $datapemilihObject->save();
            $path = $request->foto->storeAs('calongambar', $foto->getClientOriginalName());
        } else {
            $datapemilihObject = DataPemilihModel::find($id);
            $datapemilihObject->nama = $request->nama;
            $datapemilihObject->email = $request->email;
            $datapemilihObject->jenis_kelamin = $request->jenis_kelamin;
            $datapemilihObject->alamat = $request->alamat;
            $datapemilihObject->nomor_telepon = $request->nomor_telepon;
            $datapemilihObject->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $datapemilihObject = DataPemilihModel::find($id);
        $datapemilihObject->delete();
    }
}
