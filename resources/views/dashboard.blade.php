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

            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start mb-3">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                        Welcome <a class="fw-semibold"
                            href="be_pages_generic_profile.html">{{ ucfirst(auth()->user()->name) }}</a>, everything
                        looks
                        great.
                    </h2>
                </div>
                <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                    <a class="btn btn-sm btn-alt-secondary space-x-1" href="be_pages_generic_profile_edit.html">
                        <i class="fa fa-cogs opacity-50"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </div>

            <div class="row items-push">
                <div class="col-sm-6 col-xxl-3">
                    <!-- Pending Orders -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $managers->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Manager</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-user-tie fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('users.index', ['role' => 'Project Manager']) }}">
                                <span>View all managers</span>
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
                                <dt class="fs-3 fw-bold">{{ $members->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Members</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-user fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('users.index') }}">
                                <span>View all members</span>
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
                                <i class="fa fa-money-check fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('projects.index') }}">
                                <span>View all projects</span>
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
                                <dt class="fs-3 fw-bold">{{ $tasks->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Tasks</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-chart-bar fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('tasks.index') }}">
                                <span>View all tasks</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Conversion Rate-->
                </div>
            </div>
        </div>
    @elseif (auth()->user()->role->name == 'Project Manager')
        <div class="content">
            <div class="alert alert-info d-flex align-items-center alert-dismissible" role="alert">
                <div class="flex-shrink-0">
                    <i class="fa fa-fw fa-info-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">
                        Welcome to the Dashboard Manager {{ ucfirst(auth()->user()->name) }}, anything to check?
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <div
                class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start mb-3">
                <div class="flex-grow-1 mb-1 mb-md-0">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                        Welcome <a class="fw-semibold"
                            href="be_pages_generic_profile.html">{{ ucfirst(auth()->user()->name) }}</a>, everything
                        looks
                        great.
                    </h2>
                </div>
                <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                    <a class="btn btn-sm btn-alt-secondary space-x-1" href="be_pages_generic_profile_edit.html">
                        <i class="fa fa-cogs opacity-50"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </div>

            <div class="row items-push">
                <div class="col-sm-6 col-xxl-3">
                    <!-- Pending Orders -->
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $managers->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Manager</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-user-tie fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('users.index', ['role' => 'Project Manager']) }}">
                                <span>View all managers</span>
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
                                <dt class="fs-3 fw-bold">{{ $members->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Members</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-user fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('users.index') }}">
                                <span>View all members</span>
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
                                <dt class="fs-3 fw-bold">
                                    {{ $projects->where('project_author', auth()->user()->name)->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Your Own Projects</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-money-check fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('projects.index') }}">
                                <span>View all projects</span>
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
                                <dt class="fs-3 fw-bold">
                                    {{ $tasks->where('task_author', auth()->user()->name)->count() }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Your Own Tasks</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-chart-bar fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('tasks.index') }}">
                                <span>View all tasks</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                    <!-- END Conversion Rate-->
                </div>
            </div>
        </div>
    @else
        <div class="content">
            <div class="alert alert-info d-flex align-items-center alert-dismissible" role="alert">
                <div class="flex-shrink-0">
                    <i class="fa fa-fw fa-info-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="mb-0">
                        Welcome to the Dashboard {{ ucfirst(auth()->user()->name) }}, anything to check?
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <!-- Quick Overview -->
            <div class="row">
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="{{ route('tasks.member') }}">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-primary">
                                {{ $taskMember->count() }}</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                @if($taskMember->count() > 1)
                                    Your Tasks
                                @else
                                    Your Task
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="{{ route('projects.member') }}">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-success">{{ $projectMember->count() }}</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                @if($projectMember->count() > 1)
                                    Your Projects
                                @else
                                    Your Project
                                @endif
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-info">{{ auth()->user()->task()->where('status', 'finished')->count() }}</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                Task Done
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-dark">
                                <i class="fa fa-user-friends"></i>
                            </div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                Your Colleagues
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- END Quick Overview -->
        </div>


    @endif
    <x-slot name="script">

    </x-slot>
</x-layout>
