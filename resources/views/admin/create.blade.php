@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Create Customer </h3></div>
                <div class="card-body">
                    <form action="{{route('order.store')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            @if($errors->has('nama'))
                                <span class="label label-danger" style="color:red">{{$errors->first('nama')}}</span>                                                                                        
                            @endif
                            <input type="text" class="form-control" name="nama" >                            
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            @if($errors->has('email'))
                                <span class="label label-danger" style="color:red">{{$errors->first('email')}}</span>
                            @endif
                            <input type="text" class="form-control" name="email" >
                        </div>
                        <div class="form-group">                            
                            <label for="formGroupExampleInput">No Handphone</label>
                            @if($errors->has('nohp'))
                                <span class="label label-danger" style="color:red">{{$errors->first('nohp')}}</span>
                            @endif
                            <input type="text" class="form-control" name="nohp" onkeypress='validate(event)'>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Alamat</label>
                            @if($errors->has('alamat'))
                                <span class="label label-danger" style="color:red">{{$errors->first('alamat')}}</span>                                
                            @endif
                            <input type="text" class="form-control" name="alamat" >
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Produk</label>
                            <select  id="produk" class="form-control" name="produk" >
                                @foreach($produk as $produk)
                                    <!-- <option name="produk" value="{{$produk->id}}">{{$produk->nama}}</option> -->
                                    <option value="{{$produk->id}}" >{{$produk->nama}}</option>
                                @endforeach
                            </select>                            
                        </div>                        
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jumlah</label>
                            @if($errors->has('jumlah'))
                                <span class="label label-danger" style="color:red">{{$errors->first('jumlah')}}</span>
                            @endif
                            <input type="text" class="form-control" name="jumlah" placeholder="jumlah" onkeypress='validate(event)'>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
        </div>        
    </div>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
    
@endsection