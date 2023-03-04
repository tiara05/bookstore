@extends('User.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Fitur Tambahan</h2>
          <ol>
            <li><a href="">Toko Buku</a></li>
            <li>Fitur Tambahan</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <!-- ======= About Section ======= -->
    <section id="about" class="about pt-5">
        <div class="container" data-aos="fade-up">

            <div class="container">
            <form class="form form-horizontal mb-4" action="{{ route('tambah.proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row  align-items-center">
                  <div class="col-4">
                    <label for="inputsatu" class="col-form-label">Input 1</label>
                  </div>
                  <div class="col-8">
                    <input type="text" id="inputsatu" name="inputsatu" class="form-control">
                  </div>
                </div>
                <div class="row  align-items-center mt-4">
                  <div class="col-4">
                    <label for="inputdua" class="col-form-label">Input 2</label>
                  </div>
                  <div class="col-8">
                    <input type="text" id="inputdua" name="inputdua" class="form-control">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4" data-toggle="modal" data-target="#contohModal">Submit</button>
            </form>
 
            </div>

        </div>
    </section><!-- End About Section -->

@endsection
