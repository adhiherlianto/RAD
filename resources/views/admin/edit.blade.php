@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Customer Table</h3></div>
                <div class="card-body">
                    <form action="{{route('order.update', ['id'=> $order->id, 'cid'=>$order->cid])}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$order->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Produk</label>
                            <select  id="produk" class="form-control" name="produk">
                                @foreach($produk as $produk)
                                    <!-- <option name="produk" value="{{$produk->id}}">{{$produk->nama}}</option> -->
                                    <option value="{{$produk->id}}" {{ ($produk->id == $order->id) ? 'selected' : '' }} >{{$produk->nama}}</option>
                                @endforeach
                            </select>                            
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">NoHp</label>
                            <input type="text" class="form-control" name="nohp" value="{{$order->nohp}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="{{$order->keterangan}}">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" value="{{$order->jumlah}}">
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>        
    </div>
    
@endsection