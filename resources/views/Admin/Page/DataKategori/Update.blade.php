                    <form class="form form-horizontal pb-4" action="{{ route('datakategori.update',$kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Kategori</label>
                          <input type="text" value="{{$kategori->nama_kategori}}" id="namakategori" name="namakategori" class="form-control" placeholder="Enter Name" required />
                        </div>
                        
                        <button class="btn btn-primary" type="submit" style="float: right">Save changes</button>
                    </form>