<?php

namespace App\Http\Controllers;

use App\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $permohonans = Permohonan::orderBy('id_permohonan','desc')->get();
        return view('admin.permohonan', compact('permohonans'));
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

    public function detail_permohonan($id)
    {
        $permohonan = Permohonan::where('id_permohonan',$id)->first();
        return view('admin.detail_permohonan', ['permohonan' => $permohonan ]);
    }

    public function unduh_surat_kuasa()
    {
        $filename = 'SURAT KUASA.doc';
        $path = Storage::disk('public')->path($filename);
        return response()->download($path);
        
    }

    public function unduh_surat_pernyataan()
    {
        $filename = 'SURAT PERNYATAAN.docx';
        $path = Storage::disk('public')->path($filename);
        return response()->download($path);
        
    }

    public function upload_surat_permohonan(Request $request)
    {   
        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();


         $rules = [
            'surat_pernyataan' => 'required',
            // 'surat_pernyataan' => 'required|size:2048|mimes:pdf',
        ];

        $messages = [
            'required' => 'Kolom :attribute Harus Diisi.',
            // 'size'       => ':attribute maksimal 2 MB',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $surat_pernyataan = $request->file('surat_pernyataan');

        $name_surat_pernyataan = date('YmdHis').'.'.$surat_pernyataan->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/surat_pernyataan/');
        $surat_pernyataan->move($destinationPath,$name_surat_pernyataan);

        $input = [
            'surat_permohonan'          => $name_surat_pernyataan,
        ];

        $saveSuratPernyataan = $getDataPermohonan->update($input);

        if($saveSuratPernyataan)
        {
            Alert::success('Berhasil', 'Upload E-doc Surat Pernyataan')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }


}
