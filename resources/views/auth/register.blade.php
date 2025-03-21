<div class="container-fluid py-2">
    <!-- Add Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg active" value="{{ old('name') }}" required autofocus />
                            <label class="form-label" for="name">Name</label>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg active" value="{{ old('email') }}" required />
                            <label class="form-label" for="email">Email address</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-4">
                            <label class="form-label mb-2">Register as</label>
                            <select id="role" name="role" class="form-select form-select-lg" required>
                                <option value="admin">Admin</option><option value="student">Student</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                            <label class="form-label" for="password">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" required />
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('login') }}" class="text-primary">Already registered?</a>
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script>
        // Initialize MDB Form fields
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            const input = formOutline.querySelector('input');
            if (!input) return;

            // Add active class if input has value
            if (input.value !== '') {
                formOutline.classList.add('active');
            }
            
            // Add event listeners for focus and input
            input.addEventListener('focus', () => {
                formOutline.classList.add('active');
            });

            input.addEventListener('blur', () => {
                if (input.value === '') {
                    formOutline.classList.remove('active');
                }
            });

            input.addEventListener('input', () => {
                if (input.value !== '') {
                    formOutline.classList.add('active');
                }
            });
        });

        // Initialize Material Design Bootstrap
        new mdb.Input(document.querySelector('.form-outline')).init();
    </script>
</div>

