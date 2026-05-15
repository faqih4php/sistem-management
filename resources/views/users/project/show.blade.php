<x-layout>
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Project Details</h3>
                <div class="block-options">
                    <a class="btn btn-sm btn-alt-secondary" href="{{ route('projects.member') }}">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-content text-center">
                <div class="py-4">
                    <div class="mb-3">
                        <img class="img-avatar" src="{{ asset('media/photos/download.jpg') }}" alt="Folder Project">
                    </div>
                    <h1 class="fs-lg mb-0">
                        <span>{{ ucfirst($projects->name) }}</span>
                    </h1>
                    <p class="fs-sm fw-medium text-muted">Maker: {{ ucfirst($projects->project_author) }}</p>
                </div>
            </div>
            <div class="block-content bg-body-light text-center">
                <div class="row items-push text-uppercase">
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Members</div>
                        <a class="link-fx fs-3 text-primary" href="">{{ $projects->user->count() }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Tasks</div>
                        <a class="link-fx fs-3 text-primary" href="">{{ $projects->task->count() }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Task Done</div>
                        <a class="link-fx fs-3 text-primary" href="">{{ $taskDones->count() }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Task On Progress</div>
                        <a class="link-fx fs-3 text-primary" href="">{{ $taskProgress->count() }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Details</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- List Users -->
                        <div class="block block-rounded block-bordered">
                            <div class="block-header border-bottom">
                                <h3 class="block-title">List Users</h3>
                            </div>
                            <div class="block-content">
                                @foreach ($users as $user)
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="mb-0 text-center">{{ $loop->iteration }}. {{ ucfirst($user->name) }}
                                        </p>
                                        <div class="btn-group">
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-sm btn-alt-info" title="See Detail Task">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- END Billing Address -->
                    </div>
                    <div class="col-lg-6">
                        <!-- List Tasks -->
                        <div class="block block-rounded block-bordered">
                            <div class="block-header border-bottom">
                                <h3 class="block-title">List Tasks</h3>
                            </div>
                            <div class="block-content">
                                @foreach ($tasks as $task)
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <p class="mb-0 text-center">{{ $loop->iteration }}. {{ ucfirst($task->name) }}
                                        </p>
                                        <div class="btn-group">
                                            @if ($task->status == 'pending')
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Pending</span>
                                            @elseif($task->status == 'progress')
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Progress</span>
                                            @else
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Finished</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- END Shipping Address -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
