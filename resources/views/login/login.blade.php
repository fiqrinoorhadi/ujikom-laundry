<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Clean & Clean Laundry</title>
    <link rel="stylesheet" href="{{ asset('layout-login/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout-login/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layout-login/style.css') }}">
</head>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<body>
    <div class="container">
        <div class="row mb-5">
            <div class="col">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
            </div>
        </div>
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card border-0 shadow rounded-3 my-5">
            <div class="card-body p-4 p-sm-5" >
              <h5 class="card-title text-center mb-5 fw-light fs-5">Login Admin</h5>
              <form action="{{ route('login.authenticate') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                  <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput">
                  <label for="floatingInput">Username</label>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                  <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword">
                  <label for="floatingPassword">Password</label>
                  @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-grid">
                  <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                    in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('layout-login/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
