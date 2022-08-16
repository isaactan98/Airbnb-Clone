<x-app-layout>
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
            <div class="overflow-hidden">
                <form action="{{ $submit }}" method="post">
                    @csrf
                    <div class="card bg-white">
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
                                        <label class="flex justify-between w-full input-group">
                                            <button type="button" class="btn btn-outline rounded-full">-</button>
                                            <input type="text" min="1"
                                                class="input input-bordered text-center"
                                                value="{{ old('number_of_guest', @$hosting->number_of_guest ?? 1) }}"
                                                name="number_of_guest" autocomplete="off" />
                                            <button type="button" class="btn btn-outline rounded-full">+</button>
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
                            <div class="form-control w-full mt-4">
                                <div class="flex justify-end">
                                    <a href="{{ route('hosting.listing') }}" class="btn mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-white mt-4">
                        <div class="card-body">
                            <div class="card-title underline">Room Details</div>
                            <div class="mt-2 overflow-x-auto">
                                <table class="table w-full">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Bed</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="room_body">
                                        @if (@$hosting->rooms)
                                            @foreach ($hosting->rooms as $room)
                                                <tr>
                                                    <td>
                                                        <input name='room_name[]' class='input bg-transparent w-full'
                                                            value='{{ $room->name }}'>
                                                        <input name='room_id[]' type="hidden" class='input w-full'
                                                            value="{{ $room->id }}">
                                                    </td>
                                                    <td>
                                                        <input name='room_description[]' class='input w-full'
                                                            value='{{ $room->description }}'>
                                                    </td>
                                                    <td>
                                                        <input name='room_price[]' class='input w-full'
                                                            value='{{ $room->price }}'>
                                                    </td>
                                                    <td>
                                                        <input name='room_bed[]' class='input w-full'
                                                            value='{{ $room->bed }}'>
                                                    </td>
                                                    <td>
                                                        <input name='room_status[]' class='input w-full'
                                                            value='{{ $room->status }}'>
                                                    </td>
                                                    <td>
                                                        <button
                                                            class='btn btn-outline btn-sm btn-warning hover:!text-white'>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr id="insertb4">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4 card bg-white">
                    <form id="room_form" class="card-body ">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex-1">
                                <div class="form-control">
                                    <label for="name" class="label">
                                        <span class="label-text">Name</span>
                                    </label>
                                    <input type="text" class="input input-bordered w-full" id="name"
                                        name="name" value="{{ old('name') }}" placeholder="Name"
                                        autocomplete="off">
                                </div>
                                <div class="form-control">
                                    <label for="name" class="label">
                                        <span class="label-text">Description</span>
                                    </label>
                                    <textarea name="description" id="editor" class="input input-bordered h-full" rows="10">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="form-control">
                                    <label for="price" class="label">
                                        <span class="label-text">Price</span>
                                    </label>
                                    <input type="number" class="input input-bordered w-full" id="price"
                                        name="price" value="{{ old('price') }}" placeholder="Price"
                                        min="1" autocomplete="off">
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Bed</span>
                                    </label>
                                    <input type="text" class="input input-bordered w-full" name="bed"
                                        placeholder="1 King Bed">
                                </div>
                                <div class="form-control">
                                    <label for="status" class="label">
                                        <span class="label-text">Status</span>
                                    </label>
                                    <select class="select select-bordered" name="status">
                                        @foreach ($room_status as $status)
                                            <option @if ($status == old('status')) selected @endif
                                                value="{{ $status }}">
                                                {{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-control mt-4">
                                    <button type="submit" class="btn btn-outline btn-success hover:!text-white">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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

        var form = document.getElementById('room_form');
        var room_body = document.getElementById('room_body');
        form.addEventListener('submit', function(e) {
            let obj = {};
            let tr = document.createElement('tr');
            let td = "";
            e.preventDefault();
            let formData = new FormData(form);
            for (let [key, value] of formData) {
                obj[key] = value;
            }

            if (obj.name != '' && obj.description != '' && obj.price != '' && obj.bed != '' && obj.status != '') {
                td += "<td><input name='room_name[]' class='input bg-transparent w-full' value='" + obj.name +
                    "'><input name='room_id[]' class='input w-full' type='hidden'></td>";
                td += "<td><input name='room_description[]' class='input w-full' value='" + obj.description +
                    "'></td>";
                td += "<td><input name='room_price[]' class='input w-full' value='" + obj.price + "'></td>";
                td += "<td><input name='room_bed[]' class='input w-full' value='" + obj.bed + "'></td>";
                td += "<td><input name='room_status[]' class='input w-full' value='" + obj.status + "'></td>";
                td +=
                    "<td><button class='btn btn-outline btn-sm btn-warning hover:!text-white'>Delete</button></td>";

                tr.innerHTML = td;

                room_body.insertBefore(tr, room_body.lastElementChild);

                form.reset();
            } else {
                alert('Please fill all fields');
            }


        });
    </script>
</x-app-layout>
