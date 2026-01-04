@extends('layouts.app')

@section('title', 'Input Nilai - ' . $section->subject->name)

@section('content')
    <div class="space-y-6" x-data="{ activeTab: 'daily' }">
        <!-- Header -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                    {{ $section->subject->name }} - {{ $section->schoolClass->level }} {{ $section->schoolClass->name }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">Guru: {{ $section->teacher->name }}</p>
            </div>
            <div class="mt-4 flex md:ml-4 md:mt-0">
                <a href="{{ route('grades.index') }}"
                    class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Kembali</a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="activeTab = 'daily'"
                    :class="activeTab === 'daily' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    Nilai Harian
                </button>
                <button @click="activeTab = 'midterm'"
                    :class="activeTab === 'midterm' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    UTS (Tengah Semester)
                </button>
                <button @click="activeTab = 'final'"
                    :class="activeTab === 'final' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                    class="whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium">
                    UAS (Akhir Semester)
                </button>
            </nav>
        </div>

        <!-- Form -->
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_section_id" value="{{ $section->id }}">

                    <!-- Helper hidden input for type, updated by Alpine -->
                    <input type="hidden" name="active_type_helper" :value="activeTab">

                    <!-- Table for Daily Grades -->
                    <div x-show="activeTab === 'daily'" class="space-y-4">
                        <div class="text-sm text-gray-500 mb-4">Input Nilai Harian siswa.</div>
                        @include('grades.partials.grade-table', ['type' => 'daily', 'students' => $section->students, 'grades' => $section->grades])
                    </div>

                    <!-- Table for Midterm Grades -->
                    <div x-show="activeTab === 'midterm'" class="space-y-4" style="display: none;">
                        <div class="text-sm text-gray-500 mb-4">Input Nilai UTS siswa.</div>
                        @include('grades.partials.grade-table', ['type' => 'midterm', 'students' => $section->students, 'grades' => $section->grades])
                    </div>

                    <!-- Table for Final Grades -->
                    <div x-show="activeTab === 'final'" class="space-y-4" style="display: none;">
                        <div class="text-sm text-gray-500 mb-4">Input Nilai UAS siswa.</div>
                        @include('grades.partials.grade-table', ['type' => 'final', 'students' => $section->students, 'grades' => $section->grades])
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Simpan Semua Nilai
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection