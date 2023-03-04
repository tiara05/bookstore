@extends('User.Master')
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Checkout</h2>
          <ol>
            <li><a href="">Marketplace</a></li>
            <li>Checkout</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="about p-3">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless text-nowrap mb-4">
                            <thead >
                                <tr class="border-bottom ">
                                    <th scope="col" colspan="4" style="font-size: 25px">Alamat Pengiriman</th>
                                </tr>
                                @foreach($user as $us)
                                <tr>
                                    <td>Nama Pembeli</td> 
                                    <td class="">: {{$us->name}}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td class="">: {{$us->telepon}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Pembeli</td>
                                    <td colspan="" style="text-transform: lowercase;">: {{$us->alamat}}</td>  
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless text-nowrap mb-4">
                            
                            <thead >
                                <tr class="border-bottom mt-4">
                                    <th scope="col" colspan="3" style="font-size: 25px">Produk Dipesan</th>
                                    <td class="text-center"><span style="color: #BDBDBD;">Harga Satuan</span></td>
                                    <td class="text-center"><span style="color: #BDBDBD;">Jumlah</span></td>
                                    <td class="text-center"><span style="color: #BDBDBD;">Subtotal Produk</span></td>
                                </tr>
                                
                            </thead>
                            <tbody>
                                {{-- jdjd --}}
                                <?php
                                    $no = 0;
                                ?>
                                    @foreach($rt as $ts)
                                            <?php
                                                $no += 1;
                                            ?>
                                                <tr class="align-middle text-center">
                                                    <td style="">{{$no}}</td>
                                                    <td style=""><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                    <td style="">{{$ts->produk->nama_produk}}</td>
                                                    <td style="">@currency($ts->produk->harga)</td>
                                                    <td style="">{{$ts->jumlah}}</td>
                                                    <td style="">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                <form action="{{ route('checkout.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <div class="d-grid gap-2">
                            <a href="{{route('landing.index')}}" style="background-color: #BF9742; color: white; " class="btn">BELANJA LAGI</a>
                        </div>
                        
                    </div> 
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <h4><a href="">Total Amount</a></h4>
                            <div class="row">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <p>Sub Total </p>
                                        <p>Diskon</p>
                                    </div>
                                
                                    <div class="flex-grow-1 text-end">
                                        <p>@currency($tot)</p> 
                                        <p>@currency($diskon)</p> 
                                    
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    <h6>Grand Total</h6>
                                    </div>
                                
                                    <div class="flex-grow-1 text-end">
                                        <h6>@currency($tot - $diskon)</h6>
                                         <input type="hidden" id="total" name="total" class="form-control" value="{{$total}}" required>
                                         <input type="hidden" id="pembayaran" name="pembayaran" class="form-control" value="transfer" required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn" style="background-color: #BF9742; color: white; ">BAYAR SEKARANG</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </section>
@endsection
