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

    <title>Login - Bookstore</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../favicon.png" />

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link href="assetadmin/css/app.css" rel="stylesheet">

  </head>

  <body>
        <div class="container position-absolute top-50 start-50 translate-middle">
            <div class="authentication-wrapper authentication-basic container-p-y">
              <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                  <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center text-center">
                      <a href="index.html" class="app-brand-link gap-2 ">
                        <h3 class="app-brand-text demo text-body fw-bolder ">TIARA'S BOOKSTORE'</h3>
                      </a>
                    </div>
                    <!-- /Logo -->

                    <form id="formAuthentication" class="mb-3" action="{{route('proses_loginuser')}}" method="POST">
                    {{ csrf_field() }}
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Enter your email"
                          autofocus
                        />
                      </div>
                      <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-merge">
                          <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                          />
                        </div>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                      </div>
                    </form>

                    <p class="text-center">
                      <span>New on our platform?</span>
                      <a href="{{ route('registeruser') }}">
                        <span>Create an account</span>
                      </a>
                    </p>
                  </div>
                </div>
                <!-- /Register -->
              </div>
            </div>
          
        </div>

  </body>
</html>
