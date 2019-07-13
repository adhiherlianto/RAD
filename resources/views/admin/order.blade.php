@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Customer Table</h3></div>
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
                            <td><a href="#" class="btn btn-primary">Selesai</a></td>
                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</a><a href="#" class="btn btn-danger">Delete</a></td>
                        </tr>
                      @endforeach                                                
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>        
    </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">        
        <div class="modal-body">
          <form action="">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="nama">Produk</label>
                    <input type="text" name="produk" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="nama">No Handphone</label>
                    <input type="text" name="nohp" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="nama">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection