<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use Auth;


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
                ->select('customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id as id')
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
        //
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
                ->select('customers.id AS cid','customers.nama AS nama', 'customers.email AS email', 'customers.nohp AS nohp', 'customers.keterangan AS keterangan', 'produks.nama AS produk', 'orders.jumlah', 'orders.id AS id')
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
        $update =   DB::table('orders')->update(['status'=>'1'])->where('id', '=', $id);

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
}
