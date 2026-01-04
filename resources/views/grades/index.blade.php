@extends('layouts.app')

@section('title', 'Input Nilai')

@section('content')
    <div class="space-y-6">
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Input Nilai
                </h2>
                <p class="mt-1 text-sm text-gray-500">Pilih kelas dan mata pelajaran untuk mulai mengisi nilai siswa.</p>
            </div>
        </div>

        @if($sections->isEmpty())
            <div class="rounded-md bg-yellow-50 p-4">
                <div class="flex">
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">Tidak ada kelas yang ditugaskan.</h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>Anda belum ditugaskan untuk mengajar kelas manapun pada tahun akademik aktif ini. Silakan hubungi
                                Administrator.</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($sections as $section)
                    <div
                        class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:border-gray-400">
                        <div class="flex-shrink-0">
                            <span
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-600 font-bold">
                                {{ $section->schoolClass->level ?? '?' }}
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <a href="{{ route('grades.create', ['course_section_id' => $section->id]) }}"
                                class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">{{ $section->subject->name ?? 'Unknown Subject' }}</p>
                                <p class="truncate text-sm text-gray-500">{{ $section->schoolClass->name ?? 'Unknown Class' }}</p>
                            </a>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection