<?php

namespace App\Http\Controllers;

use App\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aktaCerai = DB::table('sipp.perkara','sipp.perkara_hakim_pn')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_hakim_pn','sipp.perkara.perkara_id','=','sipp.perkara_hakim_pn.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->where('sipp.perkara_hakim_pn.urutan','=',1)
        ->whereNotNull('sipp.perkara_putusan.tanggal_bht')
        ->whereNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_hakim_pn.hakim_nama')
        ->get()->count();

         $monitoringKK = DB::table('sipp.perkara')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        ->whereNotNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->whereNotNull('file_kk')
        ->whereNotNull('no_kk')
        ->where('sipp.perkara.tanggal_pendaftaran','>=','2022-01-01')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_akta_cerai.nomor_urut_akta_cerai','sipp.perkara_akta_cerai.nomor_akta_cerai','sipp.perkara_akta_cerai.no_seri_akta_cerai','sipp.perkara_pihak2.alamat as alamat_termohon','sipp.perkara_pihak1.alamat as alamat_pemohon')        
        ->orderBy('sipp.perkara_akta_cerai.nomor_urut_akta_cerai','desc')
        ->get()->count();

         $monitoringPOS = DB::table('sipp.perkara')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        ->whereNotNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->whereNotNull('file_kk')
        ->whereNotNull('no_kk')
        ->whereNull('resi_pos')
        ->where('jenis_layanan',2)
        ->where('sipp.perkara.tanggal_pendaftaran','>=','2022-01-01')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_akta_cerai.nomor_urut_akta_cerai','sipp.perkara_akta_cerai.nomor_akta_cerai','sipp.perkara_akta_cerai.no_seri_akta_cerai','sipp.perkara_pihak2.alamat as alamat_termohon','sipp.perkara_pihak1.alamat as alamat_pemohon','permohonan.no_kk')        
        ->orderBy('sipp.perkara_akta_cerai.nomor_urut_akta_cerai','desc')
        ->get()->count();

        $totalpermohonanKK = Permohonan::where('jenis_layanan',1)->count();
        $totalpermohonanKKPOS = Permohonan::where('jenis_layanan',2)->count();

        return view('admin.dashboard', compact('aktaCerai','monitoringKK','monitoringPOS','totalpermohonanKK','totalpermohonanKKPOS'));
    }

    public function telusurPerkara(Request $request)
    {


        // $nomorPerkara = $request->nomor;
        // $tahunPerkara = $request->tahun;
        // $nomorHp = $request->nomorHp;
        

        // $perkara = $nomorPerkara.'/Pdt.G/'.$tahunPerkara.'/PA.Tbh';
        // $dataPerkara = DB::table('permohonan')
        // ->join('sipp.perkara','permohonan.nomor_perkara_permohonan','=','sipp.perkara.nomor_perkara')
        // // ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        // // ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        // // ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        // ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        // ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        // //     ->join('sipp.perkara', )
        //     ->where('nomor_perkara_permohonan',$perkara)
        //     ->where('nomor_hp_pemohon',$nomorHp)
        //     ->first();

        // var_dump($dataPerkara);

        // if ($dataPerkara != null) {
            # code...
            return view('welcome');
        // }else{
            // return view('welcome',['dataPerkara' =>null]);

        // }
        
    }

    public function permohonan()
    {

        $permohonans = Permohonan::orderBy('id_permohonan','asc')->get();

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
        $getDataPermohonan = Permohonan::findOrFail($id);

        if ($getDataPermohonan->nomor_perkara_permohonan != null) {
             $permohonan = DB::table('permohonan')
                ->join('sipp.perkara', 'permohonan.nomor_perkara_permohonan', '=', 'sipp.perkara.nomor_perkara')
                ->join('sipp.perkara_pihak1', 'sipp.perkara.perkara_id', '=', 'perkara_pihak1.perkara_id')
                ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
                ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
                ->where('id_permohonan',$id)
                ->first();

            $termohon = DB::table('permohonan')
                ->join('sipp.perkara', 'permohonan.nomor_perkara_permohonan', '=', 'sipp.perkara.nomor_perkara')
                ->join('sipp.perkara_pihak2', 'sipp.perkara.perkara_id', '=', 'perkara_pihak2.perkara_id')
                ->where('id_permohonan',$id)
                ->first();
        }else{
            $permohonan = DB::table('permohonan')
                ->where('id_permohonan',$id)
                ->first();

            $termohon = DB::table('permohonan')
                ->where('id_permohonan',$id)
                ->first();
        }
        
           
        return view('admin.detail_permohonan', ['permohonan' => $permohonan, 'termohon'=>$termohon]);
    }

    public function unduh_template_surat_kuasa()
    {
        $filename = 'SURAT KUASA.doc';
        $path = Storage::disk('public')->path($filename);
        return response()->download($path);
        
    }

    public function unduh_template_surat_pernyataan()
    {
        $filename = 'SURAT PERNYATAAN.docx';
        $path = Storage::disk('public')->path($filename);
        return response()->download($path);
        
    }

    public function unduh_surat_pernyataan($id)
    {
        $getFileSuratPernyataan = Permohonan::findOrFail($id);

        $filename = $getFileSuratPernyataan->surat_permohonan;
        $path = Storage::disk('public')->path('surat_pernyataan/'.$filename);
        return response()->download($path);
        
    }

    public function unduh_surat_kuasa($id)
    {
        $getFileSuratKuasa = Permohonan::findOrFail($id);

        $filename = $getFileSuratKuasa->surat_kuasa;
        $path = Storage::disk('public')->path('surat_kuasa/'.$filename);
        return response()->download($path);
        
    }
    public function unduh_kk($id)
    {
        $getFileKK = Permohonan::findOrFail($id);

        $filename = $getFileKK->file_kk;
        $path = Storage::disk('public')->path('kk/'.$filename);
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

    public function upload_surat_kuasa(Request $request)
    {   
        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();


         $rules = [
            'surat_kuasa' => 'required',
            // 'surat_pernyataan' => 'required|size:2048|mimes:pdf',
        ];

        $messages = [
            'required' => 'Kolom :attribute Harus Diisi.',
            // 'size'       => ':attribute maksimal 2 MB',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $surat_kuasa = $request->file('surat_kuasa');

        $name_surat_kuasa = date('YmdHis').'.'.$surat_kuasa->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/surat_kuasa/');
        $surat_kuasa->move($destinationPath,$name_surat_kuasa);

        $input = [
            'surat_kuasa'          => $name_surat_kuasa,
        ];

        $saveSuratKuasa = $getDataPermohonan->update($input);

        if($saveSuratKuasa)
        {
            Alert::success('Berhasil', 'Upload E-doc Surat Kuasa')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }

    public function edit_surat_permohonan(Request $request)
    {   
        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();

         $filePermohonanLama =storage_path('app/public/surat_pernyataan/'.$getDataPermohonan->surat_permohonan);

         $rules = [
            'surat_permohonan' => 'required|max:2048',
        ];

        $messages = [
            'required'  => 'Kolom :attribute Harus Diisi.',
            'max'       => ':attribute maksimal 2 MB.',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $surat_permohonan = $request->file('surat_permohonan');

        $name_surat_permohonan = date('YmdHis').'.'.$surat_permohonan->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/surat_pernyataan/');

        $input = [
            'surat_permohonan'          => $name_surat_permohonan,
        ];

        $saveSuratPermohonan = $getDataPermohonan->update($input);

        if($saveSuratPermohonan)
        {
            
            $surat_permohonan->move($destinationPath,$name_surat_permohonan);
            File::delete($filePermohonanLama);
            Alert::success('Berhasil', 'Upload E-doc Surat Permohonan')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }

    public function edit_surat_kuasa(Request $request)
    {   
        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();

        $fileKuasaLama =storage_path('app/public/surat_kuasa/'.$getDataPermohonan->surat_kuasa);

         $rules = [
            'surat_kuasa' => 'required|max:2048',
        ];

        $messages = [
            'required'  => 'Kolom :attribute Harus Diisi.',
            'max'       => ':attribute maksimal 2 MB.',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $surat_kuasa = $request->file('surat_kuasa');

        $name_surat_kuasa = date('YmdHis').'.'.$surat_kuasa->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/surat_kuasa/');

        $input = [
            'surat_kuasa'          => $name_surat_kuasa,
        ];

        $saveSuratKuasa = $getDataPermohonan->update($input);

        if($saveSuratKuasa)
        {
            
            $surat_kuasa->move($destinationPath,$name_surat_kuasa);
            File::delete($fileKuasaLama);
            Alert::success('Berhasil', 'Upload E-doc Surat Kuasa')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }

    public function upload_kk(Request $request)
    {   
        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();


         $rules = [
            'kk' => 'required',
            // 'surat_pernyataan' => 'required|size:2048|mimes:pdf',
        ];

        $messages = [
            'required' => 'Kolom :attribute Harus Diisi.',
            // 'size'       => ':attribute maksimal 2 MB',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $kk = $request->file('kk');
        $no_kk = $request->no_kk;

        $name_kk = date('YmdHis').'.'.$kk->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/kk/');
        $kk->move($destinationPath,$name_kk);

        $input = [
            'file_kk'          => $name_kk,
            'no_kk'            => $no_kk
        ];

        $saveKK = $getDataPermohonan->update($input);

        if($saveKK)
        {
            Alert::success('Berhasil', 'Upload E-doc Kartu Keluarga')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }

    public function edit_kk(Request $request)
    {   

        $getDataPermohonan = Permohonan::where('id_permohonan', $request->id_permohonan)->first();

        $fileKKLama =storage_path('app/public/kk/'.$getDataPermohonan->file_kk);

        $rules = [
            'kk' => 'required|max:2048',
        ];

        $messages = [
            'required'  => 'Kolom :attribute Harus Diisi.',
            'max'       => ':attribute maksimal 2 MB.',
            // 'mimes'       => ':attribute harus pdf',
        ];

        $this->validate($request, $rules, $messages);

        $kk = $request->file('kk');
        $no_kk = $request->no_kk;

        $name_kk = date('YmdHis').'.'.$kk->getClientOriginalExtension();
        
        $destinationPath =storage_path('app/public/kk/');

        $input = [
            'file_kk'          => $name_kk,
            'no_kk'          => $no_kk,
        ];

        $saveKK = $getDataPermohonan->update($input);

        if($saveKK)
        {
            
            $kk->move($destinationPath,$name_kk);
            File::delete($fileKKLama);
            Alert::success('Berhasil', 'Upload E-doc Kartu Keluarga')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }
    }

    public function cekNomorPerkara(Request $request)
    {
        
        $nomorPerkara = $request->nomorPerkara;
        $dataPerkara = DB::table('sipp.perkara')->where('nomor_perkara',$nomorPerkara)->first();

        return response()->json(['success'=>'200', 'data' => $dataPerkara]);
               
    }

    public function cekPerkaraPemohon(Request $request)
    {
        
        $nomorPerkara = $request->nomorPerkara;
        $nomorHp = $request->nomorHp;

        $permohonan = DB::table('permohonan')
                ->join('sipp.perkara', 'permohonan.nomor_perkara_permohonan', '=', 'sipp.perkara.nomor_perkara')
                ->join('sipp.perkara_pihak1', 'sipp.perkara.perkara_id', '=', 'perkara_pihak1.perkara_id')
                ->where('nomor_perkara_permohonan',$nomorPerkara)
                ->where('nomor_hp_pemohon',$nomorHp)
                ->first();

            $termohon = DB::table('permohonan')
                ->join('sipp.perkara', 'permohonan.nomor_perkara_permohonan', '=', 'sipp.perkara.nomor_perkara')
                ->join('sipp.perkara_pihak2', 'sipp.perkara.perkara_id', '=', 'perkara_pihak2.perkara_id')
                ->where('nomor_perkara_permohonan',$nomorPerkara)
                ->where('nomor_hp_pemohon',$nomorHp)
                ->first();

        $dataPerkara = DB::table('permohonan')
        ->join('sipp.perkara','permohonan.nomor_perkara_permohonan','=','sipp.perkara.nomor_perkara')
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        // ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        //     ->join('sipp.perkara', )
            ->where('nomor_perkara_permohonan',$nomorPerkara)
            ->where('nomor_hp_pemohon',$nomorHp)
            ->first();

            // var_dump($dataPerkara);

        return response()->json(['success'=>'200', 'data' => $dataPerkara, 'pemohon'=>$permohonan, 'termohon'=>$termohon]);
               
    }
   

    public function inputNomorPerkara(Request $request)
    {
        $rules = [
            'tahun' => 'required',
            'nomor' => 'required',
        ];

        $messages = [
            'required'  => 'Kolom :attribute Harus Diisi.'
        ];

        $this->validate($request, $rules, $messages);

        $getDataPermohonan = Permohonan::findOrFail($request->id_permohonan);
        $nomorPerkara = $request->nomor .'/Pdt.G/'.$request->tahun.'/PA.Tbh';

        $input = [
            'nomor_perkara_permohonan' => $nomorPerkara
        ];

        $saveNomorPerkara = $getDataPermohonan->update($input);

        if($saveNomorPerkara)
        {
            Alert::success('Berhasil', 'Input Nomor Perkara')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }


    }

    function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }

    public function inputNomorResi(Request $request)
    {
        
        $getDataPermohonan = Permohonan::findOrFail($request->id_permohonan);
        $getNoHpPemohon =  $getDataPermohonan->nomor_hp_pemohon;
        $pesan = "*[Informasi]* \r\nAssalamulaikum Wr Wb. \r\nDokumen anda telah dikirim ke alamat terdaftar melalui POS dengan Nomor Resi *".$request->no_resi.".* Dikirim otomatis PA.Tembilahan";
        
        $input = [
            'resi_pos' => $request->no_resi
        ];

        $saveNomorResi = $getDataPermohonan->update($input);

        if($saveNomorResi)
        {

            $data_array =  array(
                'number' => $getNoHpPemohon,
                'message' => $pesan,
            );
            $make_call = $this->callAPI('POST', 'http://192.168.77.232:8000/send-message/', json_encode($data_array));
            $response = json_decode($make_call, true);
           

            Alert::success('Berhasil', 'Input Nomor Resi POS')->persistent('OK')->autoClose(3000);
            return redirect()->route('permohonan');
        }


    }

    public function monitoring_ac()
    {
       
        $aktaCerai = DB::table('sipp.perkara','sipp.perkara_hakim_pn')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_hakim_pn','sipp.perkara.perkara_id','=','sipp.perkara_hakim_pn.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->where('sipp.perkara_hakim_pn.urutan','=',1)
        ->whereNotNull('sipp.perkara_putusan.tanggal_bht')
        ->whereNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_hakim_pn.hakim_nama')
        
        ->orderBy('sipp.perkara_putusan.tanggal_bht','desc')
        ->get();

        return view('admin.monitoringAC', compact('aktaCerai'));
    }

    public function monitoring_kk()
    {

        $monitoringKK = DB::table('sipp.perkara')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        ->whereNotNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->whereNotNull('file_kk')
        ->whereNotNull('no_kk')
        ->where('sipp.perkara.tanggal_pendaftaran','>=','2022-01-01')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_akta_cerai.nomor_urut_akta_cerai','sipp.perkara_akta_cerai.nomor_akta_cerai','sipp.perkara_akta_cerai.no_seri_akta_cerai','sipp.perkara_pihak2.alamat as alamat_termohon','sipp.perkara_pihak1.alamat as alamat_pemohon')        
        ->orderBy('sipp.perkara_akta_cerai.nomor_urut_akta_cerai','desc')
        ->get();

        return view('admin.monitoringKK', compact('monitoringKK'));
    }

      public function monitoring_pengiriman_pos()
    {

         $monitoringPOS = DB::table('sipp.perkara')
        ->distinct()
        ->join('sipp.perkara_putusan','sipp.perkara.perkara_id','=','sipp.perkara_putusan.perkara_id')
        ->join('sipp.perkara_akta_cerai','sipp.perkara.perkara_id','=','sipp.perkara_akta_cerai.perkara_id')
        ->join('permohonan','sipp.perkara.nomor_perkara','=','permohonan.nomor_perkara_permohonan')
        ->join('sipp.perkara_pihak2','sipp.perkara.perkara_id','=','sipp.perkara_pihak2.perkara_id')
        ->join('sipp.perkara_pihak1','sipp.perkara.perkara_id','=','sipp.perkara_pihak1.perkara_id')
        ->whereNotNull('sipp.perkara_akta_cerai.nomor_akta_cerai')
        ->whereNotNull('file_kk')
        ->whereNotNull('no_kk')
        ->whereNull('resi_pos')
        ->where('jenis_layanan',2)
        ->where('sipp.perkara.tanggal_pendaftaran','>=','2022-01-01')
        ->select('sipp.perkara.nomor_perkara','sipp.perkara.tanggal_pendaftaran','sipp.perkara.pihak1_text','sipp.perkara.pihak2_text','sipp.perkara.jenis_perkara_text','sipp.perkara_putusan.tanggal_putusan','sipp.perkara_putusan.tanggal_bht','sipp.perkara_akta_cerai.tgl_akta_cerai','sipp.perkara_akta_cerai.nomor_urut_akta_cerai','sipp.perkara_akta_cerai.nomor_akta_cerai','sipp.perkara_akta_cerai.no_seri_akta_cerai','sipp.perkara_pihak2.alamat as alamat_termohon','sipp.perkara_pihak1.alamat as alamat_pemohon','permohonan.no_kk')        
        ->orderBy('sipp.perkara_akta_cerai.nomor_urut_akta_cerai','desc')
        ->get();

        return view('admin.monitoringPengirimanPos', compact('monitoringPOS'));
    }


}
