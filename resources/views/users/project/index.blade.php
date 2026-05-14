<x-layout>
    <x-slot name="title">
        Projects
    </x-slot>
    <x-slot name="style">

    </x-slot>
    <div class="content d-flex row">
        <div class="col-xl-6">
            <div class="block block-rounded h-100 mb-0">
                <div class="block-header block-header-default">
                    <h3 class="block-title">List Project that you have</h3>
                </div>
                <div class="block-content">
                    <ul class="nav-items push">
                        @foreach ($projects as $project)
                            <li>
                                <a class="d-flex py-3" href="{{ route('projects.show', $project->id) }}"
                                    title="Detail Project">
                                    <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar48"
                                            src="{{ asset('media/photos/download.jpg') }}" alt="">
                                        {{-- <span class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span> --}}
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-semibold">{{ ucfirst($project->name) }}</div>
                                        <div class="fs-sm text-muted">{{ ucfirst($project->project_author) }}</div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center me-3">
                                        <i class="si si-arrow-right"></i>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="block block-rounded h-100 mb-0 py-1">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Project Task</h3>
                </div>
                <div class="block-content">
                    @foreach ($projects as $project)
                        <ol class="nav-items push">
                            <li class="mb-0">
                                <div class="fw-semibold flex-shrink-0 me-3 ms-2 mb-2 overlay-container overlay-bottom text-primary">
                                    {{ $loop->iteration }}. {{ ucfirst($project->name) }}</div>
                                <div class="nav-items push">
                                @foreach ($tasks->where('project_id', $project->id) as $task)
                                        <div class="ms-4 mb-3">
                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-start">
                                                    <div class="fw-bold fs-sm me-2 mt-1">&bull;</div>
                                                    <div>
                                                        <div class="fw-semibold fs-sm">{{ ucfirst($task->name) }}</div>
                                                        <div class="fs-sm text-muted">Maker:
                                                            {{ ucfirst($task->task_author) }}</div>
                                                    </div>
                                                </div>
                                                <div class="me-3">
                                                    @if ($task->status == 'pending')
                                                        <span
                                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Pending</span>
                                                    @elseif($task->status == 'progress')
                                                        <span
                                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Progress</span>
                                                    @else
                                                        <span
                                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Finished</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                </div>
                            </li>
                        </ol>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">

    </x-slot>
</x-layout>
