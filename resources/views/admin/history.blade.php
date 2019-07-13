@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Customer History Table</h3></div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">                      
                      <th>Nama</th>
                      <th>Produk</th>
                      <th>No Hp</th>                      
                      <th>Keterangan</th>
                      <th>Status</th>                      
                    </thead>
                    <tbody>
                      @foreach($order as $order)
                        <tr>
                            <td>{{$order->nama}}</td>
                            <td>{{$order->produk}}</td>
                            <td>{{$order->nohp}}</td>
                            <td>{{$order->keterangan}}</td>
                            <td>Selesai</td>
                      @endforeach                                                
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>        
    </div>
    
@endsection