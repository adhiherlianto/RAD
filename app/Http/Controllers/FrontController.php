<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Customer;
use App\Order;

class FrontController extends Controller
{
    function index()
    {
    	$produk = Produk::all();
        return view('pageOne.index', ['produk'=> $produk]);
    }
    function form($id)
    {	

    	$prdk = Produk::find($id);
    	return view('pageOne.formOrder', ['produk'=>$prdk]);
    }

    function insert(Request $request, $id)
    {   


    	$aturan = [
    		'name' => 'required',
    		'email' => 'required|unique',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
            'message' => 'required',
    	];

        $pesan = [
            'required' => 'Data wajib di isi',
            'numeric'  => 'Data wajib Angka',
            'unique'   => 'Email sudah terdaftar'
        ];

        $this->validate($request, $aturan, $pesan);
        dd($id);

     //    Customer::create([
     //        'nama' => $request->name,
     //        'email' => $request->email,
     //        'nohp' => $request->phone,
     //        'file' => '1.jpg',
     //        'keterangan' => $request->message
     //    ]);

     //    $id = DB::getPdo()->lastInsertId();

     //    Order::create([
     //        'customer_id' => $id,
     //        'produk_id' => 
     //    ]);



        // return redirect()->back();
    }



    // public function store(Request $request)
    // {
    //     $aturan = [
    //         'nama' => 'required',
    //         'kategori' => 'required',
    //         'jumlah' => 'required|numeric',
    //         'hjual' => 'required|numeric',
    //         'hbeli' => 'required|numeric',
    //     ];

    //     $pesan = [
    //         'required' => 'Data ini wajib di Isi',
    //         'numeric' => 'Mohon isi dengan angka'
    //     ];

    //     $this->validate($request,$aturan,$pesan);

    //     produk::create([
    //         'nama' => $request->nama,
    //         'harga_beli' => $request->hbeli,
    //         'harga_jual' => $request->hjual,
    //         'qty' => $request->jumlah,
    //         'id_kategori' => $request->kategori
    //     ]);

    //     return redirect()->route('home');
    // }
}



