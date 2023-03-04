@extends('Admin.Master')

@section('content')
    <div class="container" data-aos="fade-up">
                        <?php
                            $no = 0;
                        ?>
                        @if($trans->isEmpty())
                            <center><h5>Maaf... Belum Ada Pesanan...</h5></center>
                        @else
                        @foreach($trans as $or)
                        <div class="icon-box iconbox-blue p-4 mt-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <h4 ><a href="" style="font-size: 22px;">Nomor Order : {{$or->no_order}}</a></h4>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <h4 style="">{{$or->status}}</h4>
                                </div>
                            </div>      <div class="table-responsive text-nowrap">
                                            <table class="table table-borderless text-nowrap mb-4">
                                                <thead >
                                                    <tr class="border-bottom mt-4">
                                                        <th scope="col" colspan="2"></th>
                                                        <td class="text-center"><span style="color: #BDBDBD;">Nama Produk</span></td>
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
                                                    @foreach($order as $ts)
                                                        @if($ts -> no_order == $or -> no_order)
                                                        <?php
                                                            $no += 1;
                                                        ?>
                                                            <tr>
                                                               <th scope="row" style="line-height: 8rem; text-align: center">{{$no}}</th>
                                                                <td style="line-height: 8rem;text-align: center"><center><img src="{{ asset('dataproduk/' . $ts->produk->foto_produk) }}" alt="foto" class="img-fluid" style="height: 8rem; padding-right: 0;"><center></td>
                                                                <td style="line-height: 8rem;text-align: center">{{$ts->produk->nama_produk}}</td>
                                                                <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga)</td>
                                                                <td style="line-height: 8rem;text-align: center">{{$ts->jumlah}}</td>
                                                                <td style="line-height: 8rem;text-align: center">@currency($ts->produk->harga * $ts->jumlah)</td>
                                                                
                                                            </tr>
                                                            @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <h4 class="text-end"><a href="" style="font-size: 22px;">Total Pesanan : @currency($or->total)</a></h4>
                                        
                        </div>
                        @endforeach
                        @endif
        </div>
  

@endsection
