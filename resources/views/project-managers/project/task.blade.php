<x-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
    </x-slot>

    <div class="content">
        <div class="block block-rounded mx-auto">
            <div class="block-header block-header-default">
                <h3 class="block-title">Project Task</h3>
            </div>
            <div class="block-content block-content-full overflow-x-auto">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th class="w-20">Name</th>
                            <th>Date</th>
                            <th>From Project</th>
                            <th>Description</th>
                            <th style="width: 50px;">Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="text-center fs-sm">{{ $loop->iteration }}</td>
                                <td class="fw-semibold fs-sm">{{ $task->name }}</td>
                                <td class="fw-semibold fs-sm">{{ date('d M Y', strtotime($task->start_date)) . ' - ' . date('d M Y', strtotime($task->end_date)) }}</td>
                                <td class="fw-semibold fs-sm">{{ $task->project?->name ?? '-' }}</td>
                                <td class="fw-semibold fs-sm">
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{ Str::limit($task->description, 15, '...') }}
                                        <a href="javascript:void(0)" class="btn btn-sm btn-alt-info" data-bs-toggle="modal"
                                            data-bs-target="#modal-description-{{ $task->id }}" title="See Description">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if ($task->status == 'pending')
                                        <span
                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Pending</span>
                                    @elseif($task->status == 'progress')
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Progress</span>
                                    @else
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Finished</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-sm btn-alt-warning me-1" data-bs-toggle="tooltip"
                                            title="Edit task">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-alt-danger me-1 btn-delete"
                                                data-bs-toggle="tooltip" title="Remove task">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-alt-info" data-bs-toggle="modal"
                                            data-bs-target="#modal-detail-{{ $task->id }}" title="See Detail Task">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <!-- jQuery (required for DataTables plugin) -->
        <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/datatables/dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ asset('js/pages/be_tables_datatables.min.js') }}"></script>
    </x-slot>
</x-layout>