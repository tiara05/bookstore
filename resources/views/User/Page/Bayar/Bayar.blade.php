@extends('User.Master')

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center ">
          <h2>Pembayaran</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Pembayaran</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about p-3">
        <div class="container" data-aos="fade-up">
                <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <h4>Upload Bukti Pembayaran No Order : <b>{{$bayar->no_order}}</b></h4>
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('mandiri.png') }}" alt class="mt-2" style="width: 70px;" />
                            </div>
                            </div>
                        
                            <div class="flex-grow-1">
                                <h5 class="d-block mb-0 mt-1">Bank Mandiri</h5>
                                <h6 class="d-block mt-3">No Rekening : </h6>
                                <p class="d-block" style="font-size: 14px; color: red;">896 0819 1017 5601 <b>( a.n NelayanKu ) </b></p>        
                                
                            </div>
                        </div>
                        <form class="form form-horizontal" action="{{ route('bayar.updateimg', $bayar->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-grid gap-2 mt-4">
                            <label for="upload" class="btn mb-2" tabindex="0" style="border-color: #128FE2;">
                                <span class="d-none d-sm-block"><i class="fa fa-upload me-3" aria-hidden="true"></i>Upload Bukti Pembayaran</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input
                                type="file"
                                id="upload" name="foto"
                                class="account-file-input"
                                hidden
                                accept="image/png, image/jpeg"
                                />
                            </label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn mt-4" type="submit" style="background-color: #128FE2; color: white">SUBMIT PEMBAYARAN</button>
                        </div>
                        </form>
                </div>
        </div>
    </section>
@endsection