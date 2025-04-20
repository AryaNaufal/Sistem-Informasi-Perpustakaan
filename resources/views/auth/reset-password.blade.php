<x-auth>
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image my-auto px-5">
                            <img src="{{ asset('images/reset_password.svg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Your Password</h1>
                                </div>
                                <form method="POST" action="{{ route('auth.reset-password.post') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control form-control-user"
                                            value="{{ request()->email }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password:</label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            required placeholder="Enter your new password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-user" required
                                            placeholder="Confirm your new password">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('auth.login') }}">Back to Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth>

@if ($errors->any())
    <script>
        Swal.fire({
            title: 'Oops!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#4e73df'
        });
    </script>
@endif

@if (session('status'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('status') }}",
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#4e73df'
        });
    </script>
@endif
