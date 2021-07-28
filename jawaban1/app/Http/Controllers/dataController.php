<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class dataController extends Controller
{

    public function index(){

        $data = DB::table('data')
                ->get();

        $count = DB::table('data')
                ->select(DB::raw('count(price) as total'))
                ->groupBy('barcode')
                ->get();

        $countresult = json_decode($count, true);

        $sum = DB::table('data')
                ->select(DB::raw('sum(price) as totalprice'))
                ->groupBy('barcode')
                ->get();

        $sumresult = json_decode($sum, true);

        $ready = DB::table('data')
        ->where('barcode', '1111')
        ->where('status', 'READY')
        ->count();

        $hold = DB::table('data')
        ->where('barcode', '1111')
        ->where('status', 'ONHOLD')
        ->count();

        $delivered = DB::table('data')
        ->where('barcode', '1111')
        ->where('status', 'DELIVERED')
        ->count();

        $packing = DB::table('data')
        ->where('barcode', '1111')
        ->where('status', 'PACKING')
        ->count();

        $sent = DB::table('data')
        ->where('barcode', '1111')
        ->where('status', 'SENT')
        ->count();

        $ready2 = DB::table('data')
        ->where('barcode', '1122')
        ->where('status', 'READY')
        ->count();

        $hold2 = DB::table('data')
        ->where('barcode', '1122')
        ->where('status', 'ONHOLD')
        ->count();

        $delivered2 = DB::table('data')
        ->where('barcode', '1122')
        ->where('status', 'DELIVERED')
        ->count();

        $packing2 = DB::table('data')
        ->where('barcode', '1122')
        ->where('status', 'PACKING')
        ->count();

        $sent2 = DB::table('data')
        ->where('barcode', '1122')
        ->where('status', 'SENT')
        ->count();

        return view('index')->with(compact('data', 'countresult', 'sumresult', 'ready', 'hold', 'packing', 'delivered', 'sent',
                                            'ready2', 'hold2', 'packing2', 'delivered2', 'sent2'));
    }

    public function add(){

        return view('add_data');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);
        DB::table('data')->insert([
            'barcode' => $request->barcode,
            'product_name' => $request->name,
            'price' => $request->price,
            'status' => $request->status
        ]);
        Session::flash('flash_message', 'Data berhasil ditambahkan!');
        return redirect('/');
    }

    public function edit($id)
    {
        $data = DB::table('data')->where('id',$id)->get();
        return view('edit_data',['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('data')->where('id',$request->id)->update([
            'name' => $request->nama,
            'jk' => $request->jk,
            'division_id' => $request->division_id,
            'perusahaan_id' => $request->perusahaan_id
        ]);
        Session::flash('flash_message', 'Data berhasil diedit!');
        return redirect('/');
    }

    public function delete($id)
    {
        DB::table('data')->where('id',$id)->delete();
        Session::flash('flash_message', 'Data berhasil dihapus!');
        return redirect('/');
    }
}
