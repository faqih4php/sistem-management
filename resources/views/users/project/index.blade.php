<x-layout>
    <x-slot name="title">
        Projects
    </x-slot>
    <x-slot name="style">

    </x-slot>
    <div class="content">
        <div class="row">
            <div class="col-xl-6">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">List Project that you have</h3>
                    </div>
                    <div class="block-content">
                        <ul class="nav-items push">
                            @foreach ($projects as $project)
                                <li>
                                    <a class="d-flex py-3" href="{{ route('projects.show', $project->id) }}">
                                        <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-bottom">
                                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar6.jpg"
                                                alt="">
                                            <span
                                                class="overlay-item item item-tiny item-circle border border-2 border-white bg-success"></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold">{{ ucfirst($project->name) }}</div>
                                            <div class="fs-sm text-muted">{{ ucfirst($project->project_author) }}</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">

    </x-slot>
</x-layout>
