<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $judul = 'Data User';
    protected $menu = 'datauser';
    protected $submenu = '';
    protected $direktori = 'user';

    public function index()
    {
        $data['judul'] = $this->judul;
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['users'] = Users::where('level', 'user')->get();

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
            $validate = $request->validate([
                'nama' => 'required',
                'username' => 'required|min: 4|unique:users',
                'email' => 'required|email:dns|unique:users',
                'status' => 'required',
                'level'=> 'required',
                'password' => 'required|min:5'
            ]);
    
            $validate['password'] = Bcrypt($validate['password']);
    
            User::create($validate);
            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil ditambahkan');
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

        $data['users'] = Users::where('id', $id)->first();

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
        $data['submenu'] = $this->submenu;

        $data['users'] = Users::where('id', $id)->first();

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
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'status' => 'required',
                'level'=> 'required',
            ]);
            
            $user = User::where('id', $id)->first();

            if(!empty($request->password)){
                $validate['password'] = Bcrypt($validate['password']);
            }else{
                $validate['password'] = $user->password;
            }
            if($request->username != $user->username){
                $request->validate(['username' => 'required|unique:users']);
            }
            if($request->email != $user->email){
                $request->validate(['email' => 'required|unique:users']);
            }
    
            $user->update($validate);

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil diupdate');
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
        $users = User::where('id', $id)->first();
        if(!empty($users)){
            $users->delete();

            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil dihapus');
        }else{
            return redirect()->route('user')->with('status', 'error')->with('message', 'Gagal');
        }
    }

    public function updateStat($id){
        $user = User::where('id', $id)->first();

        if($user->status < date('Y-m-d')){
            $user->status = date('Y')+5 . date('-m-d');
            $user->save();
            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil diubah');
        }else{
            $user->status = null;
            $user->save();
            return redirect()->route('user')->with('status', 'success')->with('message', 'Berhasil diubah');
        }
    }
}
