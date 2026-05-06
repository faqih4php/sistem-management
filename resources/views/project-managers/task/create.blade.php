<x-layout>
    <x-slot name="style">
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
    </x-slot>
    <div class="content">
        <form action="{{ route('tasks.store') }}" method="POST" id="form">
            @csrf
            <!-- Input tersembunyi (hidden) untuk mengirimkan ID Project secara otomatis -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Create Task</h3>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger mx-4 mt-3">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="block-content block-content-full ms-3">
                    <div class="row items-push">
                        <div class="col-lg-10 col-xl-10">
                            <div class="mb-4 d-none">
                                <label class="form-label" for="task_author">Task Author</label>
                                <input type="text" class="form-control @error('task_author') is-invalid @enderror"
                                    id="task_author" name="task_author" placeholder="Author.."
                                    value="{{ old('task_author') }}" readonly>
                                @error('task_author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Input tersembunyi (hidden) untuk mengirimkan ID Project secara otomatis -->
                            <input type="hidden" name="project_id" value="{{ $project ? $project->id : '' }}">
                            <div class="mb-4">
                                <label class="form-label" for="project_name">Project Name</label>
                                <input type="text" class="form-control @error('project_id') is-invalid @enderror" id="project_name" placeholder="Project Name" value="{{ $project ? $project->name : '' }}" readonly>
                                @error('project_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="name">Task Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter a task name.."
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 row">
                                <div class="start_date col-lg-6">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <input type="text"
                                        class="js-flatpickr form-control @error('start_date')
                                    is-invalid
                                    @enderror"
                                        id="start_date" name="start_date" placeholder="Start Date" data-alt-input="true"
                                        data-date-format="Y-m-d" data-alt-format="F j, Y"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="end_date col-lg-6">
                                    <label class="form-label" for="end_date">End Date</label>
                                    <input type="text"
                                        class="js-flatpickr form-control @error('end_date')
                                    is-invalid
                                    @enderror"
                                        id="end_date" name="end_date" placeholder="End Date" data-alt-input="true"
                                        data-date-format="Y-m-d" data-alt-format="F j, Y"
                                        value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" placeholder="Description" value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="user[]">Choose Member</label>
                                <select class="js-select2 form-select form-control @error('user') is-invalid @enderror"
                                    id="user[]" name="user[]" style="width: 100%;"
                                    data-placeholder="Choose at least two.." multiple>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4 d-none">
                                <label class="form-label" for="status">Status</label>
                                <select class="js-select2 form-select form-control" id="status" name="status"
                                    style="width: 100%;">
                                    <option value="1">Pending</option>
                                    {{-- <option value="2">Progress</option>
                                        <option value="3">Finished</option> --}}
                                </select>
                            </div>
                            <div class="row items-push">
                                <div class="col-lg-7">
                                    <button type="submit" class="btn btn-alt-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot name="script">
        <!-- jQuery (required for Select2 + jQuery Validation plugins) -->
        <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
        <script src="{{ asset('js/pages/be_forms_validation.min.js') }}"></script>

        <!-- Aktifkan Select2 pada dropdown role -->
        {{-- <script>One.helpersOnLoad(['jq-select2']);</script> --}}

        <script>
            // Inisialisasi Select2
            One.helpersOnLoad(['jq-select2']);

            // Inisialisasi Flatpickr manual agar start & end date saling terkait
            const endDatePicker = flatpickr('#end_date', {
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'F j, Y',
                minDate: null,
            });

            const startDatePicker = flatpickr('#start_date', {
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'F j, Y',
                onChange: function(selectedDates, dateStr) {
                    if (selectedDates.length > 0) {
                        // Hitung hari setelah start date
                        const minEnd = new Date(selectedDates[0]);
                        minEnd.setDate(minEnd.getDate() + 1);
                        endDatePicker.set('minDate', minEnd);

                        // Reset end date jika nilainya lebih kecil dari minDate baru
                        const currentEnd = endDatePicker.selectedDates[0];
                        if (currentEnd && currentEnd <= selectedDates[0]) {
                            endDatePicker.clear();
                        }
                    } else {
                        endDatePicker.set('minDate', null);
                    }
                }
            });

            $(document).ready(function() {
                $('#form').validate({
                    // Aturan validasi
                    rules: {
                        name: {
                            required: true,
                            maxlength: 100
                        },
                        start_date: {
                            required: true,
                        },
                        end_date: {
                            required: true,
                        },
                        description: {
                            required: true,
                        },
                        'user[]': {
                            required: true,
                            minlength: 2
                        }
                    },

                    // Pesan error custom
                    messages: {
                        name: {
                            required: 'Username is required.',
                            maxlength: 'Max 100 characters.'
                        },
                        start_date: {
                            required: 'Start date is required.',
                        },
                        end_date: {
                            required: 'End date is required.',
                        },
                        description: {
                            required: 'Description is required.',
                        },
                        'user[]': {
                            required: 'User is required.'
                        }
                    },

                    // Tambah class Bootstrap ke elemen yang error/valid
                    errorElement: 'div',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        if (element.hasClass('js-select2')) {
                            // Untuk Select2, tampilkan error setelah container select2
                            error.insertAfter(element.next('.select2-container'));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function(element) {
                        $(element).addClass('is-invalid').removeClass('is-valid');
                        // Untuk select2
                        if ($(element).hasClass('js-select2')) {
                            $(element).next('.select2-container').find('.select2-selection').addClass(
                                'is-invalid border-danger');
                        }
                    },
                    unhighlight: function(element) {
                        $(element).addClass('is-valid').removeClass('is-invalid');
                        if ($(element).hasClass('js-select2')) {
                            $(element).next('.select2-container').find('.select2-selection').removeClass(
                                'is-invalid border-danger');
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-layout>
