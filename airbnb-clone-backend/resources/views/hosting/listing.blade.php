<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
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
                                <tr class="border-b">
                                    <td class="text-center">
                                        <input type="checkbox" name="" id=""
                                            class="rounded-md border border-gray-300">
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="flex-grow">
                                            <div class="font-extrabold text-sm leading-5 text-ellipsis">Testing</div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <div class="flex items-center">
                                            <div>
                                                <svg viewBox="0 0 16 16" role="presentation" aria-hidden="true"
                                                    focusable="false" style="height:10px;width:10px;fill:#C13515">
                                                    <ellipse cx="8" cy="8" fill-rule="evenodd"
                                                        rx="8" ry="8">
                                                    </ellipse>
                                                </svg>
                                            </div>
                                            <div class="flex ml-2 text-left flex-col justify-between items-start">
                                                <div class="text-sm leading-4">Unlisted</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-2">
                                        <a href="" class="py-2 px-4 border rounded-md border-black">List</a>
                                    </td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">1</td>
                                    <td class="py-4 px-2">Johor Bahru, Johor</td>
                                    <td class="py-4 px-2">
                                        {{ $now }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
