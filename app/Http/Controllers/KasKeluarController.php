<?php

namespace App\Http\Controllers;

use App\Models\KasKeluar;
use App\Models\KasMasuk;
use App\Models\Users;
use Illuminate\Http\Request;

class KasKeluarController extends Controller
{
    protected $judul = 'Kas Keluar';
    protected $menu = 'kas_keluar';
    protected $submenu = '';
    protected $direktori = 'kas_keluar';

    public function index(){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['kas_keluar'] = KasKeluar::all();

        return view($this->direktori.'.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['kasmasuk'] = KasMasuk::sum('jumlah');

        return view($this->direktori.'.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // dd($request);
            $validate = $request->validate([
                'jenis' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',
                'nama_penarik' => 'required',
            ]);

            $user = Users::where('username', $request->nama_penarik)->first();

            if ($user) {
                if($user->status < date('Y-m-d')){
                    return back()->with('status', 'error')->with('message', 'Akun '.$user->username.' Non-Aktif');
                }
            }else {
                return back()->with('status', 'error')->with('message', 'Username tidak terdaftar');
            }
            
            $kasmasuk = KasMasuk::sum('jumlah');
            $kaskeluar = KasKeluar::sum('jumlah');
            $total = $kasmasuk - $kaskeluar;

            if($total < 0){
                return back()->with('status', 'error')->with('message', 'Penarikan melebihi batas');
            }
            
            KasKeluar::create($validate);
            return redirect()->route('kaskeluar')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;

        $data['kas_keluar'] = KasKeluar::where('id_kas_keluar', $id)->first();

        return view($this->direktori.'.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;

        $data['kas_keluar'] = KasKeluar::where('id_kas_keluar', $id)->first();

        return view($this->direktori.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validate = $request->validate([
                'jenis' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',
                'nama_penarik' => 'required',
            ]);
            
            $data = KasKeluar::where('id_kas_keluar', $id)->first();

            if(!empty($request->keterangan)){
                $validate['keterangan'] = $request->keterangan;
            }
    
            $data->update($validate);

            return redirect()->route('kaskeluar')->with('status', 'success')->with('message', 'Berhasil diupdate');
        }
        catch (\Throwable $th) {
            return back()->with('status', 'error')->with('message', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $Users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = KasKeluar::where('id_kas_keluar', $id)->first();
        if(!empty($users)){
            $users->delete();

            return redirect()->route('kaskeluar')->with('status', 'success')->with('message', 'Berhasil dihapus');
        }else{
            return redirect()->route('kaskeluar')->with('status', 'error')->with('message', 'Gagal');
        }
    }
}
