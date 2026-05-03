<x-layout>
    <x-slot name="style">
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    </x-slot>
    <div class="content">
        <form action="{{ route('users.store') }}" method="POST" id="form">
            @csrf
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Create User</h3>
                </div>

                <div class="block-content block-content-full ms-3">
                    <div class="row items-push">
                        <div class="col-lg-10 col-xl-10">
                            <div class="mb-4">
                                <label class="form-label" for="name">Username</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter a username.."
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Enter an email.."
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Enter a password.."
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm your password.."
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-4 d-none">
                                <label class="form-label" for="role">Role</label>
                                <select class="js-select2 form-select form-control" id="role" name="role"
                                    style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->where('id', '3')->exists() ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END Regular -->
                    <!-- Submit -->
                    <div class="row items-push">
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </div>
                    </div>
                    <!-- END Submit -->
                </div>
            </div>
        </form>
    </div>
    <x-slot name="script">
        <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
        <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>

        <!-- Aktifkan Select2 pada dropdown role -->
        {{-- <script>One.helpersOnLoad(['jq-select2']);</script> --}}

        <script>
            $(document).ready(function() {
                $('#form').validate({
                    // Aturan validasi
                    rules: {
                        name: {
                            required: true,
                            maxlength: 100
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6,
                            maxlength: 8
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: '#password'
                        },
                        role: {
                            required: true
                        }
                    },

                    // Pesan error custom
                    messages: {
                        name: {
                            required: 'Username is required.',
                            maxlength: 'Max 100 characters.'
                        },
                        email: {
                            required: 'Email is required.',
                            email: 'Format email is invalid.'
                        },
                        password: {
                            required: 'Password is required.',
                            minlength: 'Min 6 characters.',
                            maxlength: 'Max 8 characters.'
                        },
                        password_confirmation: {
                            required: 'Password confirmation is required.',
                            equalTo: 'Password confirmation does not match.'
                        },
                        role: {
                            required: 'Role is required.'
                        }
                    },

                    // Tambah class Bootstrap ke elemen yang error/valid
                    errorElement: 'div',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        if (element.hasClass('js-select2')) {
                            // Untuk Select2, tampilkan error setelah container select2
                            error.insertAfter(element.next('.select2-container'));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function(element) {
                        $(element).addClass('is-invalid').removeClass('is-valid');
                        // Untuk select2
                        if ($(element).hasClass('js-select2')) {
                            $(element).next('.select2-container').find('.select2-selection').addClass(
                                'is-invalid border-danger');
                        }
                    },
                    unhighlight: function(element) {
                        $(element).addClass('is-valid').removeClass('is-invalid');
                        if ($(element).hasClass('js-select2')) {
                            $(element).next('.select2-container').find('.select2-selection').removeClass(
                                'is-invalid border-danger');
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-layout>
