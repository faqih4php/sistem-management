<x-layout>
    <div class="content">
        <form class="js-validation" action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="block block-rounded w-50 mx-auto">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Create Role</h3>
                </div>
                <div class="block-content block-content-full ms-3">
                    <div class="row items-push">
                        <div class="col-lg-10 col-xl-10">
                            <div class="mb-4">
                                <label class="form-label" for="name">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter a role name..">
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
</x-layout>
