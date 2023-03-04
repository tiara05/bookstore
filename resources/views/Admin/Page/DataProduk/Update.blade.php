@extends('Admin.Master')

@section('content')
          <div class="card p-4">
                <h4 class="card-header">Update Data Produk</h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                    <form class="form form-horizontal mb-4" action="{{ route('dataproduk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Produk</label>
                          <input type="text" value="{{$produk->nama_produk}}" id="namaproduk" name="namaproduk" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Stok Produk</label>
                          <div class="input-group">
                            <input type="number" value="{{$produk->stok_produk}}" id="stokproduk" name="stokproduk" class="form-control" placeholder="14 " required>
                            <span class="input-group-text">Kg</span>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Harga Produk</label>
                          <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" value="{{$produk->harga}}" id="hargaproduk" name="hargaproduk" class="form-control" placeholder="14000 " required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Kategori Produk</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">{{$produk->kategori->nama_kategori}}</option>
                                @foreach ($kategori as $id )
                                    <option value="{{$id->id}}">{{$id->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Detail Produk</label>
                          <textarea class="form-control" rows="3" id="detailproduk" name="detailproduk">{{$produk->detail_produk}}</textarea>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Foto Produk</label>
                          <div class="input-group">
                            <img src="{{asset ('dataproduk/'.$produk->foto_produk)}}" width="200px" class="img-fluid ">
                          </div>
                        </div>

                        <button class="btn btn-primary" type="submit" style="float: right">Save changes</button>
                    </form>
              </div>
@endsection
