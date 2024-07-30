@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Past Paper</h1>
        <form action="{{ route('pastpapers.update', $pastpaper) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Existing fields -->
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ $pastpaper->title }}" required>
            </div>
            <div>
                <label for="coursecode">Course Code:</label>
                <input type="text" name="coursecode" id="coursecode" value="{{ $pastpaper->coursecode }}" required>
            </div>
            <div>
                <label for="teachers">Teachers:</label>
                <input type="text" name="teachers" id="teachers" value="{{ $pastpaper->teachers }}" required>
            </div>
            <div>
                <label for="department">Department:</label>
                <input type="text" name="department" id="department" value="{{ $pastpaper->department }}" required>
            </div>
            <div>
                <label for="subject">Subject:</label>
                <textarea name="subject" id="subject">{{ $pastpaper->subject }}</textarea>
            </div>

            <!-- Existing images section -->
            <div>
                <h3>Existing Images:</h3>
                @foreach($pastpaper->images as $image)
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $pastpaper->title }}" class="img-thumbnail" style="width: 150px; height: 150px;">
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteImage('{{ route('pastpapers.delete_image', [$pastpaper->id, $image->id]) }}')">Delete</button>
                        <a href="{{ asset('storage/' . $image->file_path) }}" download class="btn btn-primary btn-sm">Download</a>
                    </div>
                @endforeach
            </div>

            <!-- Upload additional images -->
            <div>
                <label for="images">Add More Images:</label>
                <input type="file" name="images[]" id="images" multiple>
            </div>

            <button type="submit">Update</button>
        </form>

        <!-- JavaScript for deleting images -->
        <script>
            function deleteImage(url) {
                if (confirm('Are you sure you want to delete this image?')) {
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Failed to delete image');
                        }
                    });
                }
            }
        </script>
    </div>
@endsection
