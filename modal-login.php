<div class="bg-modal">
    <div class="modal-custom">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Login</h4>
            <svg class="close-modal"  fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
        <div class="modal-body mx-3">
            <div class="form-group mt-3">
                <input type="text" class="form-control" required>
                <label class="form-control-placeholder" for="username">Username</label>
            </div>
            <div class="form-group mb-4">
                <input id="password-field" type="password" class="form-control" required>
                <label class="form-control-placeholder" for="password">Password</label>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
        </div>
        <div id="login" class="modal-footer d-flex flex-column justify-content-end align-items-center">
            <button class="btn-get-started animate__animated animate__fadeInUp scrollto">Login</button>
        </div>
    </div>
</div>