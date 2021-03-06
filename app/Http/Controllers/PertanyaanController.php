<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $get = DB::table('pertanyaan_test')->get();
        $get = Pertanyaan::all();

        foreach ($get as $val) :
            $val->serial = Crypt::encrypt(($val->id));
        endforeach;

        $data = [
            'list' => $get,
        ];

        return view('pertanyaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'user' =>  Pertanyaan::all(),
        ];
        return view('pertanyaan.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:pertanyaan_test',
            'isi' => 'required'
        ]);
        $query = Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        // $query = DB::table('pertanyaan_test')->insert([
        //     'judul' => $request->judul,
        //     'isi' => $request->isi,
        // ]);

        return redirect('/pertanyaan')->with('success', 'Data berhasil disimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idx = Crypt::decrypt($id);
        // $get = DB::table('pertanyaan_test')->where('id', $idx)->first();
        $get = Pertanyaan::where('id', $idx)->first();

        return view('pertanyaan.show', compact('get'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idx = Crypt::decrypt($id);
        // $get = DB::table('pertanyaan_test')->where('id', $idx)->first();
        $get = Pertanyaan::where('id', $idx)->first();
        $get->serial = $id;
        // $data = [
        //     'get' => $get,
        //     'serial' => $id
        // ];
        return view('pertanyaan.edit', compact('get'));
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
        $idx = Crypt::decrypt($id);
        // $idx = Crypt::decrypt($request->id);
        $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);
        $query = Pertanyaan::where('id', $idx)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);
        // $query = DB::table('pertanyaan_test')->where('id', $idx)->update([
        //     'judul' => $request->judul,
        //     'isi' => $request->isi,
        // ]);

        return redirect('/pertanyaan')->with('success', 'Data berhasil diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idx = Crypt::decrypt($id);
        $query = Pertanyaan::where('id', $idx)->delete();
        // $query = DB::table('pertanyaan_test')->where('id', $idx)->delete();

        return redirect('/pertanyaan')->with('success', 'Data berhasil dihapus !');
    }
}
