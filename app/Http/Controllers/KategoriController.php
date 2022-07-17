<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
use DataTables;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::get();
        if(request()->ajax()){
            return dataTables()->of($data)
            ->addColumn('aksi', function ($data)
            {
                $button = " <a class='btn btn-link text-info text-gradient px-3 mb-0' id='".$data->id."' href='javascript:;'><i class='fas fa-pen-alt me-2'></i></a> ";
                $button .= " <a class='btn btn-link text-danger text-gradient px-3 mb-0' id='".$data->id."' href='javascript:;'><i class='fas fa-trash'></i></a> ";
            return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }

        //
        // $k = Kategori::get();
        return view('Kategori.index');
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
        // dd($request);
        //
        $k = new Kategori;
        $k->nama_kategori = $request->nama_kategori;
        $k->save();
        return redirect('kategori');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Kategori::destroy($id);
        return redirect('kategori');
    }
}
