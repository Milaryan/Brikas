<?php

namespace App\Http\Controllers;
use App\Models\KasMasuk;
use App\Models\KasKeluar;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $judul = 'Dashboard';
    protected $menu = 'dashboard';
    protected $submenu = '';
    protected $direktori = '';

    public function index(Request $request){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['kas_masuk'] = KasMasuk::sum('jumlah');
        $data['kas_keluar'] = KasKeluar::sum('jumlah');
        $data['total'] = $data['kas_masuk'] - $data['kas_keluar'];

        return view('dashboard', $data);
    }
}
