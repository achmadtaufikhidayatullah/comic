<?php

namespace App\Http\Controllers;

use App\Juri;
use App\JuriLomba;
use App\Lomba;
use App\User;
use App\Nilai;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juri = Juri::select(DB::raw('Juri.id,nama_juri,email'))
            ->join('users','users.id','=','juri.id_user')
            ->orderBy('juri.id','ASC')
            ->get();

        return view('juri/index', compact('juri'));
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
        //user
       $user =  new User;
       $user->name = $request->nama_juri;
       $user->level = 'juri';
       $user->email = $request->email;
       $user->password = bcrypt('juri');
       $user->remember_token = Str::random(60);
       $user->save();

       //juri
       $juri = new Juri;
       $juri->nama_juri = $request->nama_juri;
       $juri->id_user = $user->id;
       $juri->save();

       return redirect('/juri')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function show(Juri $juri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function edit(Juri $juri)
    {
        $user = User::find($juri->id_user);

        return view('juri/edit', compact('juri','user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juri $juri)
    {
        Juri::where('id', $juri->id)->update([
            'nama_juri' => $request->nama_juri
        ]);

        User::where('id',$juri->id_user)->update([
            'name' => $request->nama_juri,
        ]);

   

        return redirect('/juri')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juri $juri)
    {
        $user = User::find($juri->id_user);
        $jurilomba = JuriLomba::where('id_juri',$juri->id)->get();
        // dd($jurilomba);
        if(count($jurilomba) > 0){
            $nilai = Nilai::where('id_jurilomba',$jurilomba)->delete();
            foreach($jurilomba as $value) {
                JuriLomba::destroy($value->id);
            }
        }

        Juri::destroy($juri->id);
        User::destroy($user->id);
        
        // Peserta::destroy($peserta);

        return redirect('/juri')->with('status','Data Berhasil Dihapus!');
    }

    public function jurilomba(){
        $juri = JuriLomba::select(DB::raw('Juri_Lomba.id,nama_juri,mata_lomba'))
            ->join('juri','juri.id','=','juri_lomba.id_juri')
            ->join('lomba','lomba.id','=','juri_lomba.id_lomba')
            ->orderBy('juri.id','ASC')
            ->get();

        $juriall = Juri::all();
        $lomba = Lomba::all();

        return view('juri/jurilomba',compact('juri','lomba','juriall'));
    }

    public function jurilombastore(Request $request)
    {

       //juri_lomba
       $jurilomba = new JuriLomba;
       $jurilomba->id_juri = $request->id_juri;
       $jurilomba->id_lomba = $request->id_matalomba;
       $jurilomba->save();

       return redirect('/jurilomba')->with('status', 'Data Berhasil Ditambah!');
    }

    public function editjurilomba(JuriLomba $juri)
    {
        $id_juri = $juri->id;
        $id_lomba = $juri->id_lomba;
        
        $juri = Juri::find($juri->id_juri);
        $lomba = Lomba::all();

        return view('juri/editjurilomba', compact('juri','lomba','id_juri','id_lomba')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function updatejurilomba(Request $request, Juri $juri)
    {
        JuriLomba::find($request->id)->update([
            'id_lomba' => $request->id_lomba
        ]);
   

        return redirect('/jurilomba')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Juri  $juri
     * @return \Illuminate\Http\Response
     */
    public function destroyjurilomba(JuriLomba $juri)
    {
        $jurilomba = $juri->id;
        $nilai = Nilai::where('id_jurilomba',$jurilomba)->delete();
        JuriLomba::destroy($jurilomba);
        // Peserta::destroy($peserta);

        return redirect('/jurilomba')->with('status','Data Berhasil Dihapus!');
    }

}
