<x-layout>
    <div class="content">
        <div class="col-12">
            <!-- Contextual Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Contextual Table</h3>
                </div>
                <div class="block-content">
                    <table class="table table-borderless table-vcenter table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Name</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr class="table-active">
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="fw-semibold fs-sm">{{ $project->name }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}"
                                                class="btn btn-sm btn-alt-info" data-bs-toggle="tooltip"
                                                title="Create Task">
                                                <i class="fa fa-fw fa-plus"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Contextual Table -->
        </div>
    </div>
</x-layout>
