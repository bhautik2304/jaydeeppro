<div>
    <div class="modal" id="authmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">

                    <div class="container-fluide" id="loginshow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <!-- <h5 class="modal-title">Modal title</h5> -->
                            <h2 class="fw-bold mb-0">Login In to Chai Ke coffee</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body p-5 pt-0">
                            <form action="{{url('auth/login')}}" method="POST" >
                                @csrf
                              <div class="form-floating mb-3">
                                <input type="text" name="mobaile" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Mobaile No.</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input name="pass" type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                              </div>
                              <input class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">
                              <span><a href="{{route('reset')}}">Forget Password?</a></span><br>

                              <hr class="my-4">
                              <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                              <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                                <svg class="bi me-1" width="16" height="16"><use xlink:href="#facebook"/></svg>
                                Login with Facebook
                              </button>
                              <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                                <svg class="bi me-1" width="16" height="16"><use xlink:href="#github"/></svg>
                                Login with Google
                              </button>
                            </form>
                            New to Chai ke Coffee?
                            <span><a href="#" onclick="signup()">Create account</a></span>
                          </div>
                    </div>

                    <div id="signupshow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <!-- <h5 class="modal-title">Modal title</h5> -->
                            <h2 class="fw-bold mb-0">Sign up for free</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body p-5 pt-0">
                            <form class="" action="{{url('auth/registration')}}" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                  <input type="text" name="name" class="form-control rounded-3" id="floatingInput" placeholder="name">
                                  <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="phone" name="mobaile" class="form-control rounded-3" id="floatingInput" placeholder="Mobaile No.">
                                    <label for="floatingInput">Mobaile No.</label>
                                  </div>
                              <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                              </div>
                              <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign up</button>
                              <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                              <hr class="my-4">
                              <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>

                              <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                                <svg class="bi me-1" width="16" height="16"><use xlink:href="#facebook"/></svg>
                                Sign up with Facebook
                              </button>
                              <a href={{ url('auth/google') }} class="w-100 py-2 mb-2 btn btn-outline-danger rounded-3" type="submit">
                                <i class="bi bi-google"></i>
                                Sign up with Google
                              </a>
                            </form>
                            Already have an account? <span><a href="#" onclick="login()">Login</a></span>
                          </div>
                    </div>

            </div>
        </div>
    </div>
</div>
