<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Destinations') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <ul>
            @foreach ($destinations as $item)
                <li>{{ $loop->iteration }}</li>

                <li>{{ $item }}</li>
                <li>
                    <img src="{{ asset(Storage::url($item->thubmnail)) }}" alt="Thumbnail">
                </li>
            @endforeach

        </ul>
    </div>
</x-app-layout>
