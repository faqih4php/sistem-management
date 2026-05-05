<x-layout>
    <div class="col-md-6 col-xl-3">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Choose Project to add task
                </h3>
            </div>
            <div class="block-content">
                @foreach($users as $user)
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                {{ $user->name }}
                            </h3>
                        </div>
                        <div class="block-content">
                            <p>{{ $user->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
