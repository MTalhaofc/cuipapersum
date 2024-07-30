<!-- resources/views/pastpapers/createpaper.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 p-5 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-5">Upload Past Paper</h1>
        <form action="{{ route('pastpapers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="coursecode" class="block text-sm font-medium text-gray-700">Course Code:</label>
                <input type="text" name="coursecode" id="coursecode" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="teachers" class="block text-sm font-medium text-gray-700">Teachers:</label>
                <input type="text" name="teachers" id="teachers" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <span class="block text-sm font-medium text-gray-700">Department:</span>
                <div class="mt-1 space-y-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="department" value="Computer Science" required class="form-radio text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2">Computer Science</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="department" value="Engineering" required class="form-radio text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2">Engineering</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" name="department" value="BBA" required class="form-radio text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2">BBA</span>
                        </label>
                    </div>
                </div>
            </div>
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject:</label>
                <textarea name="subject" id="subject" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            <div>
                <label for="files" class="block text-sm font-medium text-gray-700">Files:</label>
                <input type="file" name="files[]" id="files" multiple required class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Upload</button>
        </form>
    </div>
@endsection
