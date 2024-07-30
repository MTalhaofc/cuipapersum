@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 p-5 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-5">{{ $pastpaper->title }}</h1>
        <p class="mb-2"><strong class="font-semibold">Course Code:</strong> {{ $pastpaper->coursecode }}</p>
        <p class="mb-2"><strong class="font-semibold">Teachers:</strong> {{ $pastpaper->teachers }}</p>
        <p class="mb-2"><strong class="font-semibold">Department:</strong> {{ $pastpaper->department }}</p>
        <p class="mb-2"><strong class="font-semibold">Subject:</strong> {{ $pastpaper->subject }}</p>
        <div class="image-gallery grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            @foreach($pastpaper->images as $image)
                <div class="image-container bg-gray-100 p-4 rounded-lg shadow-md">
                    @if(in_array(pathinfo($image->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $pastpaper->title }}" class="w-full h-48 object-cover rounded-md">
                        <a href="{{ asset('storage/' . $image->file_path) }}" download class="block mt-2 text-blue-500 hover:underline">Download</a>
                    @elseif(pathinfo($image->file_path, PATHINFO_EXTENSION) == 'pdf')
                        <embed src="{{ asset('storage/' . $image->file_path) }}" type="application/pdf" class="w-full h-48" />
                        <a href="{{ asset('storage/' . $image->file_path) }}" download class="block mt-2 text-blue-500 hover:underline">Download PDF</a>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            <a href="{{ route('pastpapers.download', $pastpaper->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Download</a>
            @can('update', $pastpaper)
                <a href="{{ route('pastpapers.edit', $pastpaper->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 ml-2">Edit</a>
            @endcan
            @can('delete', $pastpaper)
                <form action="{{ route('pastpapers.destroy', $pastpaper->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ml-2">Delete</button>
                </form>
            @endcan
        </div>
    </div>
@endsection
