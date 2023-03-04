@extends('Admin.Master')

@section('content')
            <div class="card">
                <h5 class="card-header">Data Customer</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no = 0;
                      ?>
                        @foreach($cust as $pr)
                      <?php
                        $no += 1;
                      ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>{{$no}}</td>
                        <td>{{$pr->name}}</td>
                        <td>
                          {{$pr->email}}
                        </td>
                        <td>{{$pr->telepon}}</td>
                        <td>
                        <button type="button" class="btn btn-warning" onClick="show({{ $pr->id }})">
                        <i class="bx bx-edit-alt me-2"></i>Show Detail
                        </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Customer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <div id="page" class="p-2"></div>
                    </div>
                  </div>
                </div>
              </div>

      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script>

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('admin/datacustomer/show') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Ubah Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

    </script>
  

@endsection