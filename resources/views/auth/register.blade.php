@include('auth.header-login')

<body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        <form class="card card-md" action="{{ route('register')}}" method="POST" novalidate>
          @csrf
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <span class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </span>
              <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}" required autocomplete="name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <span class="text-danger">
                @error('email')
                  {{$message}}
                @enderror
              </span>
              <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}" required autocomplete="email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <span class="text-danger">
                @error('password')
                  {{$message}}
                @enderror
              </span>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password" id="passwordField" placeholder="Password" value="{{old('password')}}"  autocomplete="password">
                <span class="input-group-text">
                  <a href="#" class="link-secondary toggle-password" title="Show password"
                      data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                          width="24" height="24" viewBox="0 0 24 24"
                          stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                          <path
                              d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                      </svg>
                  </a>
              </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <span class="text-danger">
                @error('password_confirmation')
                  {{$message}}
                @enderror
              </span>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password_confirmation" id="passwordConfField" placeholder="Confirm Password" autocomplete="password">
                <span class="input-group-text">
                  <a href="#" class="link-secondary toggle-confpassword" title="Show password"
                      data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                          width="24" height="24" viewBox="0 0 24 24"
                          stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                          <path
                              d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                      </svg>
                  </a>
              </span>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Agree the <a href="./terms-of-service.html" tabindex="-1">terms and policy</a>.</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-muted mt-3">
          Already have account? <a href="{{ route('login')}}" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>

    @include('auth.footer-login');