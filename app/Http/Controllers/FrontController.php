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
        // dd($id);
    	$aturan = [
    		'name' => 'required',
    		'email' => 'required',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
            'message' => 'required',
    	];

        $pesan = [
            'required' => 'Data wajib di isi',            
        ];

        $this->validate($request, $aturan, $pesan);        

        $customer = Customer::create([
            'nama' => $request->name,
            'email' => $request->email,
            'nohp' => $request->phone,
            'file' => '1.jpg',
            'keterangan' => $request->message
        ]);

     

        Order::create([
            'customer_id' => $customer->id,
            'produk_id' => $id,
            'jumlah' => $request->amount,            
        ]);


        return redirect()->back();
    }

    // public function store(Request $request, $id, $cid)
    // {

    //     DB::table('customers')->where(['id' => $cid])->update([
    //         'nama' => $request->nama,            
    //         'nohp' => $request->nohp,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     DB::table('orders')->where(['id'=> $id])->update([
    //         'jumlah' => $request->jumlah,
    //         'produk_id' => $request->produk
    //     ]);

    //     return redirect()->route('order');
    // }



    
}



