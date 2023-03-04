<html
  lang="en"
  class="light-style customizer-hide"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Register - Bookstore</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../favicon.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href="assetadmin/css/app.css" rel="stylesheet">

  </head>

  <body>
    <!-- Content -->

    <div class="container-xl mb-2  position-absolute top-50 start-50 translate-middle">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center text-center">
                  <a href="index.html" class="app-brand-link gap-2">
                    <h3 class="app-brand-text demo text-body fw-bolder">TIARA'S BOOKSTORE'</h3>
                  </a>
                </div>
                <!-- /Logo -->
                <form class="form form-horizontal mb-4" action="{{ route('proses_registeruser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Customer</label>
                          <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Email</label>
                          <div class="input-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                          </div>
                        </div>
                        <div class="mb-3 form-password-toggle">
                          <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password<span> (min. 8 Karaketer)</span></label>
                          </div>
                          <div class="input-group input-group-merge">
                            <input
                              type="password"
                              id="password"
                              name="password"
                              class="form-control"
                              pattern=".{8,}"
                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                              aria-describedby="password"
                            />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">No Telepon</label>
                          <div class="input-group">
                            <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Enter Telepon" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Alamat Domisili</label>
                          <div class="input-group">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter Address" required>
                          </div>
                        </div>
                        
                        <div class="mt-4">
                          <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                        </div>
                    </form>
                      
              </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
    </div>
                    

    <!-- / Content -->

    <!-- Core JS -->


  </body>
</html>
