@extends('layouts.app')

@section('title', 'Overview')

@section('content')

<!-- Stats Grid -->
<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
    <!-- Stat Card 1 -->
    <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-gray-200">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex h-12 w-12 items-center justify-center rounded-md bg-blue-500 text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Siswa</dt>
                        <dd>
                            <div class="text-lg font-medium text-gray-900">{{ \App\Models\Student::count() }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('students.index') }}" class="font-medium text-blue-700 hover:text-blue-900">View all</a>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-gray-200">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex h-12 w-12 items-center justify-center rounded-md bg-green-500 text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 22.5a3 3 0 003-3v-8.174a.75.75 0 00-.22-.53l-8.72-8.682a.75.75 0 00-1.06 0l-8.72 8.682a.75.75 0 00-.22.53V19.5a3 3 0 003 3h12zM6 20.25v-8.762l6-5.98 6 5.98v8.762H6z" />
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Total Kelas</dt>
                        <dd>
                            <div class="text-lg font-medium text-gray-900">{{ \App\Models\SchoolClass::count() }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('classes.index') }}" class="font-medium text-green-700 hover:text-green-900">View all</a>
            </div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-gray-200">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex h-12 w-12 items-center justify-center rounded-md bg-purple-500 text-white">
                         <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Mata Pelajaran</dt>
                        <dd>
                            <div class="text-lg font-medium text-gray-900">{{ \App\Models\Subject::count() }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('subjects.index') }}" class="font-medium text-purple-700 hover:text-purple-900">View all</a>
            </div>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="overflow-hidden rounded-lg bg-white shadow ring-1 ring-gray-200">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="flex h-12 w-12 items-center justify-center rounded-md bg-yellow-500 text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="truncate text-sm font-medium text-gray-500">Tahun Ajaran</dt>
                        <dd>
                            <div class="text-lg font-medium text-gray-900">{{ \App\Models\AcademicYear::where('is_active', true)->first()->name ?? '-' }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
         <div class="bg-gray-50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('academic-years.index') }}" class="font-medium text-yellow-700 hover:text-yellow-900">Manage</a>
            </div>
        </div>
    </div>
</div>
@endsection