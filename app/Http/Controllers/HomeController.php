<?php

namespace App\Http\Controllers;

use App\Permohonan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function permohonan()
    {
        return view('admin.permohonan');
    }

    public function create_permohonan()
    {
        return view('admin.create_permohonan');
    }

    public function store_permohonan(Request $request)
    {
        $rules = [
            'pemohon' => 'required',
            'alamat_pemohon' => 'required',
            'nomor_hp_pemohon' => 'required',
            'jenis_layanan' => 'required'
        ];

        $messages = [
            'required' => 'Kolom :attribute Harus Diisi.',
            'integer'       => ':attribute harus berupa angka',
            // 'max'       => ':attribute maksimal 13 angka',
        ];

        $this->validate($request, $rules, $messages);

        $input = [
            'nama_pemohon'          => $request->pemohon,
            'alamat_pemohon'        => $request->alamat_pemohon,
            'nomor_hp_pemohon'      => $request->nomor_hp_pemohon,
            'jenis_layanan'         => $request->jenis_layanan
        ];

        $savePermohonan = Permohonan::create($input);

        if($savePermohonan)
        {
            Alert::success('Berhasil', 'Tambah Data')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }


    }


}
