@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class=" main font-black text-lg md:text-4xl text-center md:mt-12 mt-6 ">Instant Access to Past Papers <br>for Comprehensive <span class="main"> Exam Preparation</span>.</h1>

        
        </div>

<div class="mt-4 justify-center items-center align-center flex md:flex-row flex-col ">

        <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-lg ml-2 mr-2 mt-1  md:ml-0 md:mr-2 md:mt-0  ">
            <div class="flex flex-row justify-between">
                <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Computer Science</h5>
        <img class="h-8" src="{{ asset('assets/cs_dept.svg') }}" alt="Computer"></div>
            <p class="mb-3 text-xs md:text-base text-gray-700 dark:text-gray-500">Past papers of Computer Science (CS) and Software Engineering (SE).
            </p>
            <a href="{{ route('departments.show', ['department' => 'Computer Science']) }}" class="inline-flex items-center px-2 py-1 md:px-3 md:py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Go
                <svg class="rtl:rotate-180 w-2.5 h-2.5 md:w-3.5 md:h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
        <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-lg  ml-2 mr-2 mt-1  md:ml-0 md:mr-2 md:mt-0  ">
            <div class="flex flex-row justify-between">
            
            <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Engineering</h5>
            <img class="h-9" src="{{ asset('assets/eng_dept.svg') }}" alt="Engineering"></div>
    
        <p class="mb-3 text-xs md:text-base text-gray-700 dark:text-gray-500">Past papers of Electrical (EE), Civil (CE) and Mechanical (ME).
        </p>
        <a href="{{ route('departments.show', ['department' => 'Engineering']) }}" class="inline-flex items-center px-2 py-1 md:px-3 md:py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Go
            <svg class="rtl:rotate-180 w-2.5 h-2.5 md:w-3.5 md:h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>        <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-lg ml-2 mr-2 mt-1 mb-3 md:ml-0 md:mr-0 md:mt-0 md:mb-0 ">
        <div class="flex flex-row justify-between">
            
        <h5 class="mb-2 md:text-2xl font-bold tracking-tight text-gray-900 dark:text-black">BBA</h5>
        <img class="h-10" src="{{ asset('assets/bba_dept.svg') }}" alt="Business"></div>

    <p class="mb-3 text-xs md:text-base text-gray-700 dark:text-gray-500">Past papers of Business Administration and English.

    </p>
    <a href="{{ route('departments.show', ['department' => 'BBA']) }}" class="inline-flex items-center px-2 py-1 md:px-3 md:py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Go
        <svg class="rtl:rotate-180 w-2.5 h-2.5 md:w-3.5 md:h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>
</div>


        {{-- <form action="{{ route('landing') }}" method="GET" class="mt-8">
            <div>
                <label for="subject">Search by Subject:</label>
                <input type="text" name="subject" id="subject" value="{{ request('subject') }}">
            </div>
            <div>
                <label for="coursecode">Search by Course Code:</label>
                <input type="text" name="coursecode" id="coursecode" value="{{ request('coursecode') }}">
            </div>
            <button type="submit">Search</button>
        </form> --}}

        <!-- Existing search results and past papers -->
    </div>
@endsection
