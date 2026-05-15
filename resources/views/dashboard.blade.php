<x-layout>
    <x-slot name="style">

    </x-slot>
    @if (auth()->user()->role->name == 'Admin')
        <div class="content">
            <div class="alert alert-info d-flex align-items-center alert-dismissible" role="alert">
                <div class="flex-shrink-0">
                    <i class="fa fa-fw fa-info-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">
                        Welcome to the Dashboard Admin {{ ucfirst(auth()->user()->name) }}, anything to check?
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <div class="row items-push">
                <div class="col-sm-6 col-xxl-3">
                    <!-- Pending Orders -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">32</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Manager</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-gem fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>View all orders</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Pending Orders -->
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <!-- New Customers -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">124</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Members</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-user-circle fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>View all customers</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END New Customers -->
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <!-- Messages -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $projects->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Project</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-paper-plane fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>View all messages</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Messages -->
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <!-- Conversion Rate -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">4.5%</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Conversion Rate</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-chart-bar fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>View statistics</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Conversion Rate-->
                </div>
            </div>
        </div>
    @elseif (auth()->user()->role == 'Project Manager')
    @else
    @endif
    <x-slot name="script">

    </x-slot>
</x-layout>
