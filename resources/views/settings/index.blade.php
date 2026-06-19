<x-layout>
    <!-- Hero -->
    <div class="bg-image" style="background-image: url('{{ asset('media/photos/photo12@2x.jpg') }}');">
        <div class="bg-black-50">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="{{ asset('media/avatars/avatar13.jpg') }}"
                        alt="">
                </div>
                <h1 class="h2 text-white mb-0">{{ ucfirst($users->name) }}</h1>
                <span class="text-white-75">{{ $users->role->name }}</span>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Stats -->
    <div class="bg-body-extra-light">
        <div class="content content-boxed">
            <div class="row items-push text-center">
                @if (auth()->user()->role->name == 'Member')
                <div class="col-6 col-md-3">
                    <div class="fs-sm fw-semibold text-muted text-uppercase">Total Task</div>
                    <a class="link-fx fs-3" href="javascript:void(0)">{{ auth()->user()->task()->count() }}</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="fs-sm fw-semibold text-muted text-uppercase">Task Done</div>
                    <a class="link-fx fs-3"
                        href="javascript:void(0)">{{ auth()->user()->task()->where('status', 'finished')->count() }}</a>
                </div>
                @endif
                <div class="col-6 col-md-3">
                    <div class="fs-sm fw-semibold text-muted text-uppercase">Total Projects</div>
                    <a class="link-fx fs-3" href="javascript:void(0)">{{ $projects->count() }}</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="fs-sm fw-semibold text-muted text-uppercase">Projects Done</div>
                    <a class="link-fx fs-3"
                        href="javascript:void(0)">{{ $projects->where('status', 'finished')->count() }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Stats -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-7 col-xl-8">
                <!-- Updates -->
                <ul class="timeline timeline-alt py-0">
                    @foreach ($projects as $project)
                        <li class="timeline-event">
                            <img class="timeline-event-icon bg-default" src="{{ asset('media/photos/download.jpg') }}">
                            </img>
                            <div class="timeline-event-block block">
                                <div class="block-header">
                                    <h3 class="block-title">{{ $project->name }}</h3>
                                    <div class="block-options">
                                        <div class="timeline-event-time block-options-item fs-sm">
                                            {{ $project->created_at->format('d M Y') }}
                                        </div>
                                    </div>

























































                                    

                                </div>
                                <div class="block-content">
                                    <p class="fw-semibold mb-2">
                                        {{ $project->user('role_id', '3')->count() }} Users in this project.
                                    </p>
                                    <p>
                                        {{ $project->description }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <!-- END Updates -->
            </div>
            <div class="col-md-5 col-xl-4">
                <!-- Products -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-briefcase text-muted me-1"></i> Products
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="d-flex align-items-center push">
                            <div class="flex-shrink-0 me-3">
                                <a class="item item-rounded bg-info" href="javascript:void(0)">
                                    <i class="si si-rocket fa-2x text-white-75"></i>
                                </a>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">MyPanel</div>
                                <div class="fs-sm">Responsive App Template</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center push">
                            <div class="flex-shrink-0 me-3">
                                <a class="item item-rounded bg-amethyst" href="javascript:void(0)">
                                    <i class="si si-calendar fa-2x text-white-75"></i>
                                </a>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">Project Time</div>
                                <div class="fs-sm">Web Application</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center push">
                            <div class="flex-shrink-0 me-3">
                                <a class="item item-rounded bg-city" href="javascript:void(0)">
                                    <i class="si si-speedometer fa-2x text-white-75"></i>
                                </a>
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-semibold">iDashboard</div>
                                <div class="fs-sm">Bootstrap Admin Template</div>
                            </div>
                        </div>
                        <div class="text-center push">
                            <button type="button" class="btn btn-sm btn-alt-secondary">View More..</button>
                        </div>
                    </div>
                </div>
                <!-- END Products -->

                <!-- Ratings -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-pencil-alt text-muted me-1"></i> Ratings
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="fs-sm push">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <a class="fw-semibold" href="">Ryan Flores</a>
                                    <span class="text-muted">(5/5)</span>
                                </div>
                                <div class="text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="mb-0">Flawless design execution! I'm really impressed with the product, it
                                really helped me build my app so fast! Thank you!</p>
                        </div>
                        <div class="fs-sm push">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <a class="fw-semibold" href="">Carl Wells</a>
                                    <span class="text-muted">(5/5)</span>
                                </div>
                                <div class="text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="mb-0">Great value for money and awesome support! Would buy again and again!
                                Thanks!</p>
                        </div>
                        <div class="fs-sm push">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <a class="fw-semibold" href="">Henry Harrison</a>
                                    <span class="text-muted">(5/5)</span>
                                </div>
                                <div class="text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p class="mb-0">Working great in all my devices, quality and quantity in a great
                                package! Thank you!</p>
                        </div>
                        <div class="text-center push">
                            <button type="button" class="btn btn-sm btn-alt-secondary">Read More..</button>
                        </div>
                    </div>
                </div>
                <!-- END Ratings -->
                <!-- Followers -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-share-alt text-muted me-1"></i> Followers
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <ul class="nav-items fs-sm">
                            <li>
                                <a class="d-flex py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg"
                                            alt="">
                                        <span
                                            class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Susan Day</div>
                                        <div class="fw-normal text-muted">Copywriter</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar16.jpg"
                                            alt="">
                                        <span
                                            class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Adam McCoy</div>
                                        <div class="fw-normal text-muted">Web Developer</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex py-2" href="javascript:void(0)">
                                    <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar2.jpg"
                                            alt="">
                                        <span
                                            class="overlay-item item item-tiny item-circle border border-2 border-white bg-warning"></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">Carol Ray</div>
                                        <div class="fw-normal text-muted">Web Designer</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="text-center push">
                            <button type="button" class="btn btn-sm btn-alt-secondary">Load More..</button>
                        </div>
                    </div>
                </div>
                <!-- END Followers -->
            </div>
        </div>
    </div>
</x-layout>
