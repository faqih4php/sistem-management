<x-layout>
    <div class="content">
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
                        <div class="fw-semibold text-dark mb-1">Referred</div>
                        <a class="link-fx fs-3 text-primary" href="">3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
