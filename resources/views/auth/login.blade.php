
 @extends('layouts.guest')

 @section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" type="email" 
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="email"
                                                placeholder="Enter Email Address...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror    
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="password" placeholder="Password" value="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror  
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input value="Login" type="submit" class="btn btn-primary btn-user btn-block" />
                                        
                                        <hr>
                                        
                                    </form>

                                    <label>super admin:</label><br/>
                                    <strong>username: </strong><span>arash.aspx@gmail.com</span><br/>
                                    <strong>password: </strong><span>password</span>
                                    <hr>
                                    <label>supervisor:</label><br/>
                                    <strong>username: </strong><span>supervisor@laramint.com</span><br/>
                                    <hr>
                                    <label>student:</label><br/>
                                    <strong>username: </strong><span>student@laramint.com</span><br/>
                                    <hr>

                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
@endsection