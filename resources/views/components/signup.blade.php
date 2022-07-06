<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>

<div class="modal" id="signup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <!-- <h5 class="modal-title">Modal title</h5> -->
            <h2 class="fw-bold mb-0">Sign up for free</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body p-5 pt-0">
            <form class="">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-3" id="floatingInput" placeholder="name">
                  <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="phone" class="form-control rounded-3" id="floatingInput" placeholder="Mobaile No.">
                    <label for="floatingInput">Mobaile No.</label>
                  </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
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
          </div>
        </div>
      </div>
</div>
