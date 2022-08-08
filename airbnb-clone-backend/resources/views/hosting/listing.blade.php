<x-app-layout>
    @section('title')
        Hosting Listing -
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ count($hostings) . __(' Listing') }}
        </h2>
        <a href="{{ route('hosting.create') }}" class="btn btn-outline btn-sm">Create Listing</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead class="border-b">
                            <tr class="text-gray-500">
                                <th class="p-2 text-center">
                                    <input type="checkbox" name="" id=""
                                        class="rounded-md border border-gray-300">
                                </th>
                                <th align="left" class="p-2">Listing</th>
                                <th align="left" class="p-2">Status</th>
                                <th align="left" class="p-2">Todo</th>
                                <th align="left" class="p-2">Bedrooms</th>
                                <th align="left" class="p-2">Beds</th>
                                <th align="left" class="p-2">Baths</th>
                                <th align="left" class="p-2">Location</th>
                                <th align="left" class="p-2">Last Modified</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hostings as $host)
                                @php
                                    $color = '#C13515';
                                    
                                    switch ($host->status) {
                                        case 'active':
                                            $color = '#00A859';
                                            break;
                                        case 'inactive':
                                            $color = '#C13515';
                                            break;
                                        case 'unlisted':
                                            $color = '#b2b2b2';
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                @endphp
                                <tr class="border-b">
                                    <td class="text-center">
                                        <input type="checkbox" name="" id=""
                                            class="rounded-md border border-gray-300">
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="flex-grow">
                                            <div class="font-extrabold text-sm leading-5 text-ellipsis">
                                                {{ $host->title }}</div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            <div>
                                                <svg viewBox="0 0 16 16" role="presentation" aria-hidden="true"
                                                    focusable="false"
                                                    style="height:10px;width:10px;fill: {{ $color }}">
                                                    <ellipse cx="8" cy="8" fill-rule="evenodd"
                                                        rx="8" ry="8">
                                                    </ellipse>
                                                </svg>
                                            </div>
                                            <div class="flex ml-2 text-left flex-col justify-between items-start">
                                                <div class="text-sm leading-4">{{ ucfirst($host->status) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <a href="{{ route('hosting.update', $host->id) }}"
                                            class="py-2 px-4 border rounded-md border-black">List</a>
                                    </td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">{{ $host->location }}</td>
                                    <td class="py-4 px-2">
                                        {{ $host->updated_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $hostings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
