<x-layout>
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo10@2x.jpg') }}');">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="{{ asset('media/avatars/avatar13.jpg') }}"
                        alt="">
                </div>
                <h1 class="h2 text-white mb-0">Edit Account</h1>
                <h2 class="h4 fw-normal text-white-75">
                    {{ ucfirst($users->name) }}
                </h2>
                <a class="btn btn-alt-secondary" href="{{ route('profiles', auth()->user()->id) }}">
                    <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Profile
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <div class="content">
        <div class="row">
            <div class="col-md-5 col-xl-3">
                <!-- Account -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Account</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <!-- Easy Pie Chart (.js-pie-chart class is initialized in Helpers.jqEasyPieChart()) -->
                        <!-- For more info and examples you can check out http://rendro.github.io/easy-pie-chart/ -->
                        <!-- Pie Chart Container -->
                        <form action="{{ route('update-profiles', $users->id) }}" method="POST" class="text-center">
                            @method('put')
                            @csrf
                            <input type="file" name="image" id="image" class="d-none">
                            <label for="image" class="mb-0" style="cursor: pointer;">
                                <div class="js-pie-chart pie-chart position-relative" data-percent="100"
                                    data-line-width="3" data-size="100" data-bar-color="#abe37d"
                                    data-track-color="#eeeeee" data-scale-color="#dddddd">
                                    <span>
                                        <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}"
                                            alt="Your Profiles" style="filter: brightness(50%);">
                                        <i
                                            class="fa fa-pencil d-absolute position-absolute top-50 start-50 translate-middle text-white"></i>
                                    </span>
                                </div>
                            </label>
                        </form>
                        <a class="block block-rounded" href="javascript:void(0)">
                            <div class="block-content block-content-full text-center">
                                <h1 class="h3 text-white mb-0">{{ ucwords($users->name) }}</h1>
                                <h1 class="h5 fw-normal text-white-75 mb-2">{{ ucfirst($users->role->name) }}</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Account -->
            </div>
            <div class="col-md-7 col-xl-9">
                <!-- User Profile -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">User Profile</h3>
                    </div>
                    <div class="block-content">
                        <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data"
                            onsubmit="return false;">
                            <div class="row push">
                                <div class="col-lg-4">
                                    <p class="fs-sm text-muted">
                                        Your account’s vital info. Your username will be publicly visible.
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="mb-4">
                                        <label class="form-label" for="one-profile-edit-username">Username</label>
                                        <input type="text" class="form-control" id="one-profile-edit-username"
                                            name="one-profile-edit-username" placeholder="Enter your username.."
                                            value="john.parker">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="one-profile-edit-name">Name</label>
                                        <input type="text" class="form-control" id="one-profile-edit-name"
                                            name="one-profile-edit-name" placeholder="Enter your name.."
                                            value="John Parker">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                        <input type="email" class="form-control" id="one-profile-edit-email"
                                            name="one-profile-edit-email" placeholder="Enter your email.."
                                            value="john.parker@example.com">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Your Avatar</label>
                                        <div class="mb-4">
                                            <img class="img-avatar" src="assets/media/avatars/avatar13.jpg"
                                                alt="">
                                        </div>
                                        <div class="mb-4">
                                            <label for="one-profile-edit-avatar" class="form-label">Choose a new
                                                avatar</label>
                                            <input class="form-control" type="file" id="one-profile-edit-avatar">
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-alt-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END User Profile -->
            </div>
        </div>
    </div>

    <!-- Page Content -->
    {{-- <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">User Profile</h3>
            </div>
            <div class="block-content">
                <form action="be_pages_projects_edit.html" method="POST" enctype="multipart/form-data"
                    onsubmit="return false;">
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-username">Username</label>
                                <input type="text" class="form-control" id="one-profile-edit-username"
                                    name="one-profile-edit-username" placeholder="Enter your username.."
                                    value="john.parker">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-name">Name</label>
                                <input type="text" class="form-control" id="one-profile-edit-name"
                                    name="one-profile-edit-name" placeholder="Enter your name.." value="John Parker">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-email">Email Address</label>
                                <input type="email" class="form-control" id="one-profile-edit-email"
                                    name="one-profile-edit-email" placeholder="Enter your email.."
                                    value="john.parker@example.com">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="mb-4">
                                    <img class="img-avatar" src="assets/media/avatars/avatar13.jpg" alt="">
                                </div>
                                <div class="mb-4">
                                    <label for="one-profile-edit-avatar" class="form-label">Choose a new
                                        avatar</label>
                                    <input class="form-control" type="file" id="one-profile-edit-avatar">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->

        <!-- Change Password -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Change Password</h3>
            </div>
            <div class="block-content">
                <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-password">Current Password</label>
                                <input type="password" class="form-control" id="one-profile-edit-password"
                                    name="one-profile-edit-password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new">New Password</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password-new"
                                        name="one-profile-edit-password-new">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="one-profile-edit-password-new-confirm">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control"
                                        id="one-profile-edit-password-new-confirm"
                                        name="one-profile-edit-password-new-confirm">
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Change Password -->

        <!-- Billing Information -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Billing Information</h3>
            </div>
            <div class="block-content">
                <form action="be_pages_projects_edit.html" method="POST" onsubmit="return false;">
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="fs-sm text-muted">
                                Your billing information is never shown to other users and only used for creating your
                                invoices.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-company-name">Company Name
                                    (Optional)</label>
                                <input type="text" class="form-control" id="one-profile-edit-company-name"
                                    name="one-profile-edit-company-name">
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="one-profile-edit-firstname">Firstname</label>
                                    <input type="text" class="form-control" id="one-profile-edit-firstname"
                                        name="one-profile-edit-firstname">
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="one-profile-edit-lastname">Lastname</label>
                                    <input type="text" class="form-control" id="one-profile-edit-lastname"
                                        name="one-profile-edit-lastname">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-street-1">Street Address 1</label>
                                <input type="text" class="form-control" id="one-profile-edit-street-1"
                                    name="one-profile-edit-street-1">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-street-2">Street Address 2</label>
                                <input type="text" class="form-control" id="one-profile-edit-street-2"
                                    name="one-profile-edit-street-2">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-city">City</label>
                                <input type="text" class="form-control" id="one-profile-edit-city"
                                    name="one-profile-edit-city">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-postal">Postal code</label>
                                <input type="text" class="form-control" id="one-profile-edit-postal"
                                    name="one-profile-edit-postal">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="one-profile-edit-vat">VAT Number</label>
                                <input type="text" class="form-control" id="one-profile-edit-vat"
                                    name="one-profile-edit-vat" value="IT00000000" disabled>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Billing Information -->

        <!-- Connections -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Connections</h3>
            </div>
            <div class="block-content">
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            You can connect your account to third party networks to get extra features.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-7">
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn w-100 btn-alt-danger text-start" href="javascript:void(0)">
                                    <i class="fab fa-fw fa-google opacity-50 me-1"></i> Connect to Google
                                </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn w-100 btn-alt-info text-start" href="javascript:void(0)">
                                    <i class="fab fa-fw fa-twitter opacity-50 me-1"></i> Connect to Twitter
                                </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn w-100 btn-alt-primary bg-white d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>
                                        <i class="fab fa-fw fa-facebook me-1"></i> John Doe
                                    </span>
                                    <i class="fa fa-fw fa-check me-1"></i>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
                                <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Facebook Connection
                                </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-10 col-md-8 col-xl-6">
                                <a class="btn w-100 btn-alt-warning bg-white d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>
                                        <i class="fab fa-fw fa-instagram me-1"></i> @john_doe
                                    </span>
                                    <i class="fa fa-fw fa-check me-1"></i>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-6 mt-1 d-md-flex align-items-md-center fs-sm">
                                <a class="btn btn-sm btn-alt-secondary rounded-pill" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-pencil-alt me-1"></i> Edit Instagram Connection
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Connections -->
    </div> --}}
    <!-- END Page Content -->
    <x-slot name="script">
        <!-- jQuery (required for Easy Pie Chart plugin) -->
        <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>

        <!-- Page JS Helpers (Table Tools Checkable Helper + Easy Pie Chart Plugin) -->
        <script>
            One.helpersOnLoad(['one-table-tools-checkable', 'jq-easy-pie-chart']);
        </script>
    </x-slot>
</x-layout>
