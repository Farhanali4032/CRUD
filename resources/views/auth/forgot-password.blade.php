@include('auth.header-login')


<body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('password.email')}}" method="POST">
          @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Forgot password</h2>
            <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
            <div class="mb-3">
              <label class="form-label">Email</label>
              @if ($errors->has('email'))
              <span class="text-danger">
                  @error('email')
                    {{$message}}
                  @enderror
              </span>
              @else
              @if (session('status'))
                <span class="text-success">
                  {{session("status")}}
                </span>
              @endif
              @endif
              <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}">
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">
                Send me new password
              </button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Forget it, <a href="{{ route('login')}}">send me back</a> to the sign in screen.
        </div>
      </div>
    </div>


@include('auth.footer-login')