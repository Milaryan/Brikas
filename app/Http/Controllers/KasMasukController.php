<?php

namespace App\Http\Controllers;

use App\Models\KasMasuk;
use App\Models\Users;
use Illuminate\Http\Request;

class KasMasukController extends Controller
{
    protected $judul = 'Kas Masuk';
    protected $menu = 'kas_masuk';
    protected $submenu = '';
    protected $direktori = 'kas_masuk';

    public function index(){
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['kas_masuk'] = KasMasuk::all();

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
                'jenis_pemasukan' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',
                'nama_penyetor' => 'required',
            ]);

            $user = Users::where('username', $request->nama_penyetor)->first();

            if($user->status < date('Y-m-d')){
                return back()->with('status', 'error')->with('message', 'Akun '.$user->username.' Non-Aktif');
            }
    
            KasMasuk::create($validate);
            return redirect()->route('kasmasuk')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
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

        $data['kas_masuk'] = KasMasuk::where('id_kas_masuk', $id)->first();

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

        $data['kas_masuk'] = KasMasuk::where('id_kas_masuk', $id)->first();

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
                'jenis_pemasukan' => 'required',
                'jumlah' => 'required',
                'tanggal' => 'required',
                'nama_penyetor' => 'required',
            ]);
            
            $data = KasMasuk::where('id_kas_masuk', $id)->first();

            if(!empty($request->keterangan)){
                $validate['keterangan'] = $request->keterangan;
            }
    
            $data->update($validate);

            return redirect()->route('kasmasuk')->with('status', 'success')->with('message', 'Berhasil diupdate');
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
        $users = KasMasuk::where('id_kas_masuk', $id)->first();
        if(!empty($users)){
            $users->delete();

            return redirect()->route('kasmasuk')->with('status', 'success')->with('message', 'Berhasil dihapus');
        }else{
            return redirect()->route('kasmasuk')->with('status', 'error')->with('message', 'Gagal');
        }
    }
}
