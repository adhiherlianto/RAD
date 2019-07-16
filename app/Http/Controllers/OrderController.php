<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use Auth;
use App\Produk;
use App\Customer;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function order()
    {
        $order = DB::table('orders')        
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->join('produks', 'orders.produk_id', '=', 'produks.id' )
                ->select('customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id as id', DB::raw('orders.jumlah * produks.harga AS total' ))
                ->where('orders.status', '=', '0')
                ->get();        
                // dd($order);
        return view('admin.order', ['order'=> $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $produk = Produk::all();
        return view('admin.create', ['produk'=>$produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aturan = [
            'nama' => 'required',
            'email' => 'required',
            'nohp' => 'required|numeric',
            'alamat' => 'required',
            'produk' => 'required',
            'jumlah' => 'required|numeric',                        
        ];

        $pesan = [
            'required' => 'Data ini wajib di Isi',
            'numeric' => 'Mohon isi dengan angka'
        ];

        $this->validate($request,$aturan,$pesan);

        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'keterangan' => $request->alamat,
            'file' => '1.jpg'            
        ]);

        $lastID = $customer->id;

        Order::create([
            'customer_id' => $lastID,
            'produk_id' => $request->produk,
            'jumlah' => $request->jumlah,
            'status' => '0'
        ]);

        return redirect()->route('order');
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
        $order = DB::table('orders')        
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->join('produks', 'orders.produk_id', '=', 'produks.id' )
                ->select('customers.id AS cid','customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id AS id', 'orders.produk_id AS produk_id')
                ->where('orders.id', '=', $id)
                ->first();
                // dd($order);
        
        $produk = DB::table('produks')->get();

        return view('admin.edit', ['order'=> $order, 'produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $cid)
    {

        DB::table('customers')->where(['id' => $cid])->update([
            'nama' => $request->nama,            
            'nohp' => $request->nohp,
            'keterangan' => $request->keterangan,
        ]);

        DB::table('orders')->where(['id'=> $id])->update([
            'jumlah' => $request->jumlah,
            'produk_id' => $request->produk
        ]);

        return redirect()->route('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = DB::table('orders')        
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->join('produks', 'orders.produk_id', '=', 'produks.id' )
                ->select('customers.id AS cid','customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id AS id')
                ->where('orders.id', '=', $id)
                ->first();
                // dd($order);
        
        DB::table('orders')->where('id', $id)->delete();
        DB::table('customers')->where('id', $order->cid)->delete();
        return redirect()->route('order');        
    }

    public function selesai($id){
        // dd($id);

        DB::table('orders')->where('id',$id)->update(['status'=>'1']);
        
        return redirect()->route('order');
    }

    public function history(){

        $history = DB::table('orders')        
                ->join('customers', 'customers.id', '=', 'orders.customer_id')
                ->join('produks', 'orders.produk_id', '=', 'produks.id' )
                ->select('customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id as id')
                ->where('orders.status', '=', '1')
                ->get();        
                // dd($order);
        return view('admin.history', ['order'=> $history]);
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
    public function grafikProduk()
    {
        # code...
        $kateogri = DB::table('produks')->get();  
        dd($keteogori)      ;
        $value = [];
        $label = [];
        foreach ($kateogri as $i => $v) {
            $value[$i] = DB::table('orders')->where('produk_id',$v->id)->count();
            $label[$i] = $v->nama;
        }

        // return view('/admin/dashboard')
        // ->with('value',json_encode($value))
        // ->with('label',json_encode($label));
        // dd($label);

        return view('/admin/dashboard',[
            'value' => json_encode($value),
            'label' => json_encode($label)
        ]);
    }
}
