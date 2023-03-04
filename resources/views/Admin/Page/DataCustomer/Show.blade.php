
    <div class="row g-0">
      <div class="col-md-4">
        <img class="card-img-top" src="{{ asset('datauser/' . $cust->foto) }}" alt="Card image cap" style="height: 14rem;width: 14rem;" />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">{{$cust->name}}</h4>
          <div class="row">
            <div class="col-lg-4">
                <p>No Telepon</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$cust->telepon}} </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
                <p>Alamat Domisili</p>
            </div>
            <div class="col-lg-8">
              <p>: {{$cust->alamat}} </p>
            </div>
          </div>
        </div>
      </div>
   </div>
                