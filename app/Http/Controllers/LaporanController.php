<?php

namespace App\Http\Controllers;

use App\Models\KasMasuk;
use App\Models\KasKeluar;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $judul = 'Laporan Kas Masuk';
    protected $menu = 'laporan';
    protected $submenu = '';
    protected $direktori = 'laporan';

    public function kasmasuk(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = 'kasmasuk';

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['kas_masuk'] = KasMasuk::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        }else{
            $data['kas_masuk'] = KasMasuk::orderBy('tanggal', 'DESC')->get();
        }


        return view($this->direktori.'.kasmasuk.main', $data ,[
            'submenu' => 'kasmasuk'
        ]);
    }

    public function printkasmasuk(Request $request){
        $data['judul'] = $this->judul;
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['kas_masuk'] = KasMasuk::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        }else{
            $data['kas_masuk'] = KasMasuk::orderBy('tanggal', 'DESC')->get();
        }

        return view($this->direktori.'.kasmasuk.print',$data);
    }

    public function kaskeluar(Request $request)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = 'kaskeluar';

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['kas_keluar'] = KasKeluar::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        }else{
            $data['kas_keluar'] = KasKeluar::orderBy('tanggal', 'DESC')->get();
        }


        return view($this->direktori.'.kaskeluar.main', $data ,[
            'submenu' => 'kaskeluar'
        ]);
    }

    public function printkaskeluar(Request $request){
        $data['judul'] = $this->judul;
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;

        if(isset($request->tanggal_awal) && isset($request->tanggal_akhir) && !empty($request->tanggal_awal) && !empty($request->tanggal_akhir)){
            $data['kas_keluar'] = KasKeluar::whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->get();
        }else{
            $data['kas_keluar'] = KasKeluar::orderBy('tanggal', 'DESC')->get();
        }

        return view($this->direktori.'.kaskeluar.print',$data);
    }
}
