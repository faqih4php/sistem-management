<x-layout>

    <div class="content">
        <div class="block block-rounded mx-auto">
            <div class="block-header block-header-default">
                <h3 class="block-title">Task Table</h3>
            </div>
            <div class="block-content block-content-full overflow-x-auto">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th class="w-20">Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
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
                                <td class="fw-semibold fs-sm">{{ date('d M Y', strtotime($task->start_date)) }}</td>
                                <td class="fw-semibold fs-sm">{{ date('d M Y', strtotime($task->end_date)) }}</td>
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
                                            class="btn btn-sm btn-alt-secondary me-1" data-bs-toggle="tooltip"
                                            title="Edit task">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-alt-secondary me-1"
                                                data-bs-toggle="tooltip" title="Remove task">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-sm btn-alt-secondary" data-bs-toggle="modal"
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

        {{-- Modals --}}
        @foreach ($tasks as $task)
        <div class="modal" id="modal-description-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Description</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm text-white">
                            <p>{{ ucfirst($task->description) ?? '-' }}</p>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modal-detail-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-block-small"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Detail User Task</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm text-white">
                            <h6>List User: </h6>
                            @if($task->user && $task->user->count() > 0)
                                @foreach ($task->user as $user)
                                    <p class="ms-2 mb-1">{{ $loop->iteration }}. {{ $user->name }}</p>
                                @endforeach
                            @else
                                <p class="ms-2 mb-1">No users assigned.</p>
                            @endif
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
