<x-layout>
    <x-slot name="title">
        Projects | Member
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
            <div class="block block-rounded h-100 mb-0 pb-4">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Project Task</h3>
                </div>
                <div class="block-content">
                    <table class="js-table-sections table table-hover table-vcenter">
                        <thead>
                            <tr>
                                <th style="width: 30px;"></th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Maker</th>
                            </tr>
                        </thead>
                        @foreach ($projects as $project)
                        <tbody class="js-table-sections-header {{ $loop->first ? 'show table-active' : '' }}">
                            <tr>
                                <td class="text-center">
                                    <i class="fa fa-angle-right text-muted"></i>
                                </td>
                                <td class="fw-semibold">{{ ucfirst($project->name) }}</td>
                                <td>
                                    @if ($project->status == 'pending')
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Pending</span>
                                    @elseif($project->status == 'progress')
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Progress</span>
                                    @else
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Finished</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($project->project_author) }}</td>
                            </tr>
                        </tbody>
                        <tbody class="fs-sm">
                            @foreach($tasks->where('project_id', $project->id) as $task)
                                <tr>
                                    <td class="text-center"></td>
                                    <td>{{ ucfirst($task->name) }}</td>
                                    <td>
                                        @if ($task->status == 'pending')
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Pending</span>
                                        @elseif($task->status == 'progress')
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Progress</span>
                                        @else
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Finished</span>
                                        @endif
                                    </td>
                                    <td>{{ ucfirst($task->task_author) }}</td>
                                </tr>
                            @endforeach
                            @if($tasks->where('project_id', $project->id)->isEmpty())
                                <tr>
                                    <td class="text-center"></td>
                                    <td colspan="3" class="text-muted italic">No tasks assigned for this project.</td>
                                </tr>
                            @endif
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            One.helpersOnLoad(['one-table-tools-sections']);
        </script>
    </x-slot>
</x-layout>
