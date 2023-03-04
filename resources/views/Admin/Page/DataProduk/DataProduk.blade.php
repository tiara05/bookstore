@extends('Admin.Master')

@section('content')
            <div class="card">
                <h5 class="card-header">Data Produk</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <a type="button" class="btn btn-primary ms-4 mx-4 mb-4" href="{{route('dataproduk.create')}}"><i class="bx bx-add me-1"></i>Add Produk</a>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($produk as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->nama_produk}}</td>
                        <td>
                        {{$pr->stok_produk}}
                        </td>
                        <td>@currency($pr->harga)</td>
                        <td>
                        <a type="button" class="btn btn-warning"  href="{{route('dataproduk.show', $pr->id)}}">
                        <i class="bx bx-edit-alt me-2"></i>Ubah</a>
                        <a href="{{route('dataproduk.delete', $pr->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <i class="bx bx-trash me-2"></i>Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    {!! $produk->links() !!}
                  </table>
                </div>
              </div>

              

      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
     
@endsection