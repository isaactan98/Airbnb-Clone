<x-app-layout>
    <style>
        .ck-content {
            height: 300px;
        }
    </style>
    @section('title')
        {{ $title }} Hosting -
    @endsection

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }} Hosting
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-error shadow-lg mb-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $error }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ $submit }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="grid gap-6 grid-cols-1 md:grid-cols-2">
                                <div class="flex flex-col gap-4">
                                    <div class="form-control w-full">
                                        <label for="name" class="label">
                                            <span class="label-text">Title</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full" id="title"
                                            name="title" value="{{ old('title', @$hosting->title) }}"
                                            placeholder="Title" autocomplete="off">
                                    </div>
                                    <div class="form-control">
                                        <label for="name" class="label">
                                            <span class="label-text">Description</span>
                                        </label>
                                        <textarea name="description" id="editor" class="input input-bordered h-full" rows="10">{{ old('description', @$hosting->description ?? 'Having a great space to stay makes you happy') }}</textarea>
                                    </div>
                                </div>
                                <div class="grid gap-4">
                                    <div class="form-control">
                                        <label for="location" class="label">
                                            <span class="label-text">Location</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full" id="location"
                                            name="location" value="{{ old('location', @$hosting->location) }}"
                                            placeholder="Location" autocomplete="off">
                                    </div>
                                    <div class="form-control">
                                        <label for="location" class="label">
                                            <span class="label-text">Price</span>
                                        </label>
                                        <input type="number" class="input input-bordered w-full" id="price"
                                            name="price" value="{{ old('price', @$hosting->price) }}"
                                            placeholder="Price" min="1" autocomplete="off">
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Number of Guests</span>
                                        </label>
                                        <label class="input-group">
                                            <button type="button" class="btn btn-ghost rounded-full">-</button>
                                            <input type="text" min="1"
                                                class="input input-bordered text-center"
                                                value="{{ old('number_of_guest', @$hosting->number_of_guest) }}"
                                                name="number_of_guest" autocomplete="off" />
                                            <button type="button" class="btn btn-ghost rounded-full">+</button>
                                        </label>
                                    </div>
                                    <div class="form-control">
                                        <label for="" class="label">Status</label>
                                        <select class="select select-bordered" name="status">
                                            @foreach ($hosting_status as $status)
                                                <option @if ($status == old('status', @$hosting->status)) selected @endif
                                                    value="{{ $status }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-control">
                                        <label for="" class="label">Type</label>
                                        <select class="select select-bordered" name="type">
                                            @foreach ($hosting_type as $type)
                                                <option @if ($type == old('type', @$hosting->type)) selected @endif
                                                    value="{{ $type }}">{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control w-full">
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var guests = {{ @$hosting->number_of_guest ?? 1 }};
        var guestsInput = document.querySelector('.input-group input');
        var guestsButtonMinus = document.querySelector('.input-group button:first-child');
        var guestsButtonPlus = document.querySelector('.input-group button:last-child');
        guestsButtonMinus.addEventListener('click', function() {
            if (guests > 1) {
                guests--;
                guestsInput.value = guests;
            }
        });
        guestsButtonPlus.addEventListener('click', function() {
            guests++;
            guestsInput.value = guests;
        });
    </script>
</x-app-layout>
