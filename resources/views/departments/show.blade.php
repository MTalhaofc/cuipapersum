<!-- resources/views/pastpapers/indexbydepartment.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-1 p-5 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-5">{{ $department }} Past Papers</h1>

        @foreach($pastPapers as $pastPaper)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $pastPaper->title }}</h5>
                    <p class="card-text"><strong>Course Code:</strong> {{ $pastPaper->coursecode }}</p>
                    <p class="card-text"><strong>Teachers:</strong> {{ $pastPaper->teachers }}</p>
                    <p class="card-text"><strong>Department:</strong> {{ $pastPaper->department }}</p>
                    <p class="card-text"><strong>Subject:</strong> {{ $pastPaper->subject }}</p>
                    <a href="{{ route('pastpapers.show', $pastPaper) }}" class="btn btn-primary">View</a>
                    @auth
                        @if(Auth::id() === $pastPaper->user_id)
                            <a href="{{ route('pastpapers.edit', $pastPaper) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pastpapers.destroy', $pastPaper) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif
                    @endauth
                    <div class="image-gallery mt-3">
                        @foreach($pastPaper->images as $image)
                            <div class="image-container">
                                @if(in_array(pathinfo($image->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $pastPaper->title }}" class="img-thumbnail" style="width: 150px; height: 150px;">
                                    <a href="{{ asset('storage/' . $image->file_path) }}" download class="btn btn-primary btn-sm mt-2">Download</a>
                                @elseif(pathinfo($image->file_path, PATHINFO_EXTENSION) == 'pdf')
                                    <a href="{{ asset('storage/' . $image->file_path) }}" download class="btn btn-primary btn-sm mt-2">Download PDF</a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
