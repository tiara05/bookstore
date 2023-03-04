@extends('User.Master')

@section('content')

<section id="services" class="services mt-4 pb-0">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-delay="100">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../1.png" class="img-fluid d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                <img src="../2.png" class="img-fluid d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                <img src="../3.png" class="img-fluid d-block w-100" alt="">
                </div>
            </div>
        </div>
</section>
<!-- ======= Services Section ======= -->
<section id="services" class="services pt-4 pb-0">
      <div class="container" data-aos="fade-up">
        <div class="row d-flex justify-content-center" >
        <div class="row icon-boxes">
        @if($produk->isEmpty())
            <center><h5 class="mt-4">Maaf... Unit lagi Sold Out Nih...</h5></center>
        @else
            @foreach($produk as $pr)
            
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box pt-4 pb-4">
                        <img src="{{ asset('dataproduk/' . $pr->foto_produk) }}" class="card-img-top " alt="..." style="height: 250px; width: 250px" >
                        <h4 class="title"><a href="">{{$pr->nama_produk}}</a></h4>
                        <h6 class="card-text p-2" style="color: red;">@currency($pr->harga)</h6>
                        <div class="float-end">
                            <a href="{{route('detail.index', $pr->id)}}" style="background-color: #BF9742; color: white; " class="btn mt-2">Selengkapnya</a>
                        </div>
                    
                    </div>
                
                </div>
            
            @endforeach
        @endif
        </div>
        </div>
      </div>
</section><!-- End Sevices Section -->

@endsection
