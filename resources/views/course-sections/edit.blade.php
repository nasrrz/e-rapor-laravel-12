@extends('layouts.app')

@section('title', 'Edit Pembelajaran')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Pembelajaran</h3>

                <form action="{{ route('course-sections.update', $courseSection->id) }}" method="POST" class="mt-5">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6">

                        <div>
                            <label for="academic_year_id" class="block text-sm font-medium text-gray-700">Tahun
                                Akademik</label>
                            <select id="academic_year_id" name="academic_year_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm cursor-not-allowed pointer-events-none"
                                readonly>
                                @foreach($academicYears as $year)
                                    <option value="{{ $year->id }}" {{ $courseSection->academic_year_id == $year->id ? 'selected' : '' }}>
                                        {{ $year->name }} ({{ ucfirst($year->semester) }})
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Tahun akademik tidak dapat diubah.</p>
                        </div>

                        <div>
                            <label for="class_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="class_id" name="class_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm cursor-not-allowed pointer-events-none"
                                readonly>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}" {{ $courseSection->class_id == $class->id ? 'selected' : '' }}>
                                        {{ $class->level }} - {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Kelas tidak dapat diubah.</p>
                        </div>

                        <div>
                            <label for="subject_id" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                            <select id="subject_id" name="subject_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm cursor-not-allowed pointer-events-none"
                                readonly>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $courseSection->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }} ({{ $subject->code }})
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Mata pelajaran tidak dapat diubah.</p>
                        </div>

                        <div>
                            <label for="teacher_id" class="block text-sm font-medium text-gray-700">Guru Pengampu</label>
                            <select id="teacher_id" name="teacher_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Pilih Guru</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $courseSection->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-3">
                        <a href="{{ route('course-sections.index') }}"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Batal</a>
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection