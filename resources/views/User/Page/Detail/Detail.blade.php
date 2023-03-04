@extends('User.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Produk Details</h2>
          <ol>
            <li><a href="">Properti</a></li>
            <li>Produk Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
     <!-- ======= About Section ======= -->
    <section id="about" class="about pt-5">
        <div class="container" data-aos="fade-up">

            <div class="container">
                <div class="row g-0">
                    <div class="col-md-5  ">
                        <div class="img-wrapper" style="width: 80%">
                            <img
                                src="{{ asset('dataproduk/' . $produk->foto_produk) }}"
                                alt="Sample photo"
                                class="img-fluid "
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                            />
                        </div>
                    </div>
                    <div class="col-md-7">
                        
                            <h2><b>{{$produk->nama_produk}}</b></h2>
                            <br>
                            <h4 style="color:red">@currency($produk->harga) / Unit</h4>
                            <h6 style="margin-top: 5%"><b>Deskripsi Rumah :</b></h6>
                            <p>{{$produk->detail_produk}}</p>
                            <h6 style="margin-top: 5%;margin-bottom: 2%"><b>Jumlah Pesanan / Unit :</b></h6>
                        <form class="form form-horizontal" action="{{ route('checkout.checkout', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="d-flex">
                                        <button type="button" id="sub" class="sub btn btn-link px-2"><i class="fa fa-minus"></i></button>
                                        <input type="number" id="jumlah" name="jumlah" value="1" min="1" max="100"  class="form-control text-center"/>
                                        
                                        <button type="button" id="add" class="add btn btn-link px-2"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <p style="margin-top: 1%">Tersedia : <b>{{$produk->stok_produk}} Pcs</b></p>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-danger alert-block" style="margin-top: 10px">   
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                            </div>
                            <div class="pb-4 mt-4 d-grid gap-2">
                            
                                <button type="submit" class="btn" name="cart" style="background-color: #BF9742; color: white; "><i class="fa fa-cart-plus" aria-hidden="true" style="margin-right: 5%"></i>Beli Sekarang</button>
                            
                            </div>  
                        </form>
                        
                    </div>
                </div>
            </div>
            
            


            <script>
            
            $('.add').click(function () {
                
                $(this).prev().val(+$(this).prev().val() + 1);
                
            });
            $('.sub').click(function () {
                    if ($(this).next().val() > 1) {
                    $(this).next().val(+$(this).next().val() - 1);
                    }
            });
            
            </script>
        </div>
    </section><!-- End About Section -->

@endsection
