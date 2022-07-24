<?php

namespace App\Http\Controllers;

use App\Models\Pekerja;
use App\Models\Kopi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DataTables;
class KopiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pekerja = Pekerja::all();
        if ($request->ajax()) {
            // get data kopi with pekerja
            $data = Kopi::with('pekerja')->where('berat', '!=', 0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    //    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editData">Edit</a>';
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete </a>';
                        
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       return view('kopi.index', compact('pekerja'));
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
        $this->validate($request, [
            'pekerja_id' =>                'required',
            'berat' =>                      'required',
            'tgl_menimbang' =>              'required',
        ]);

        $kopi = Kopi::updateOrCreate(
            ['id' => $request->data_id],
            [
                'pekerja_id' => $request->pekerja_id,
                'berat' => $request-> berat,
                'tgl_menimbang' => $request-> tgl_menimbang,
            ]
        );

        if(!$request->data_id == ''){
            return response()->json([
                'status' => 'sukses',
                'message'=>'Data berhasil Diubah'
            ],200);
        } else {
            return response()->json([
                'status' => 'sukses',
                'message'=>'Data berhasil Ditambahkan'
            ],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kopi  $kopi
     * @return \Illuminate\Http\Response
     */
    public function show(Kopi $kopi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kopi  $kopi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kopi $kopi)
    {
        return response()->json($kopi,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kopi  $kopi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kopi $kopi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kopi  $kopi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kopi $kopi)
    {
        $kopi->delete();
        return response()->json([
            'status' => 'sukses',
            'message'=>'Data berhasil Dihapus'
        ],200);
    }
}
