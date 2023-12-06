<?php

namespace App\Http\Controllers\API;

use App\Helpers\Apiformatter;
use App\Http\Controllers\Controller;
use App\Models\Ktp;
use Illuminate\Http\Request;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ktp::join('propinsi', 'propinsi.id_prop', '=', 'ktp.Id_prop')
                ->get(['ktp.id','ktp.Id_prop','ktp.nik','ktp.nama','propinsi.id_prop','propinsi.nama_prop', 'propinsi.jumlah_penduduk']);

        if($data){
            return ApiFormatter::createApi(200, 'Sukses mendapatkan data', $data);
        } else {
            return ApiFormatter::createApi(400, 'Gagal mendapatkan data', $data);
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
        try {
            $request->validate([
                'id_prop' => 'required',
                'nik' => 'required',
                'nama' => 'required',
            ]);

            $ktp = Ktp::create([
                'id_prop' => $request->id_prop,
                'nik' => $request->nik,
                'nama' => $request->nama
            ]);

            $data = Ktp::where('id', '=', $ktp->id)->get();

            if ($data) {
                return ApiFormatter::createApi(201, 'Sukses Tambah Data KTP', $data);
            } else {
                return ApiFormatter::createApi(400, 'Gagal tambah Data KTP');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Gagal tambah Data KTP');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ktp::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Sukses Get Detil KTP', $data);
        } else {
            return ApiFormatter::createApi(400, 'Sukses Get Detil KTP');
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
        try {
            $ktp = Ktp::findOrFail($id);

            $ktp->update([
                'id_prop' => $request->id_prop,
                'nik' => $request->nik,
                'nama' => $request->nama
            ]);

            $data = Ktp::where('id', '=', $ktp->id)->get();

            if ($data) {
                return ApiFormatter::createApi(201, 'Sukses update KTP', $data);
            } else {
                return ApiFormatter::createApi(400, 'Gagal update KTP');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Gagal update KTP');
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
        try {
            $ktp = Ktp::findOrFail($id);

            $data = $ktp->delete();

            if ($data) {
                return ApiFormatter::createApi(201, 'Sukses Delete data');
            } else {
                return ApiFormatter::createApi(400, 'Gagal Delete Data');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Gagal Delete Data');
        }
    }
}
