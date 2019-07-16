@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Customer Table</h3><a href="{{route('order.create')}}" class="btn btn-primary">create Order</a></div>
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">                      
                      <th>Nama</th>
                      <th>Produk</th>
                      <th>No Hp</th>                      
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                      <th>Selesai</th>
                    </thead>
                    <tbody>
                      @foreach($order as $order)
                        <tr>
                            <td>{{$order->nama}}</td>
                            <td>{{$order->produk}}</td>
                            <td>{{$order->nohp}}</td>
                            <td>{{$order->keterangan}}</td>
                            <td>{{$order->jumlah}}</td>
                            <td><a href="{{route('order.selesai', ['id' => $order->id])}}" class="btn btn-dangerous">Selesai</a></td>
                            
                            <td><a href="{{route('order.edit', ['id' => $order->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('order.delete', ['id' => $order->id])}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                      @endforeach                                                
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>        
    </div>
    
@endsection