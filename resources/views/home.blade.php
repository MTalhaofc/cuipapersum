@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Past Papers</h1>
        @foreach($pastPapers as $pastPaper)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $pastPaper->title }}</h5>
                    <p class="card-text"><strong>Course Code:</strong> {{ $pastPaper->coursecode }}</p>
                    <p class="card-text"><strong>Teachers:</strong> {{ $pastPaper->teachers }}</p>
                    <p class="card-text"><strong>Department:</strong> {{ $pastPaper->department }}</p>
                    <p class="card-text"><strong>Subject:</strong> {{ $pastPaper->subject }}</p>
                    <a href="{{ route('pastpapers.download', $pastPaper->id) }}" class="btn btn-success">Download</a>
                    @if(Auth::id() === $pastPaper->user_id)
                        <a href="{{ route('pastpapers.edit', $pastPaper->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pastpapers.destroy', $pastPaper->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                        </form>
                    <div class="mt-3">
                        @foreach($pastPaper->images as $image)
                            @if(in_array(pathinfo($image->file_path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                                <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $pastPaper->title }}" class="img-thumbnail" style="width: 200px; height: 200px;">
                            @elseif(pathinfo($image->file_path, PATHINFO_EXTENSION) == 'pdf')
                                <a href="{{ asset('storage/' . $image->file_path) }}" target="_blank" class="btn btn-primary mt-3">View PDF</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
