@extends('layouts.app')

@section('title', 'Edit Data Kelas')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Data Kelas</h3>

                <!-- Note: Route params. Resource 'classes' -> param 'class'. But controller typehints SchoolClass $schoolClass. 
                     If Route Model Binding works by ID, routing to 'classes.update', $schoolClass->id should work. -->
                <form action="{{ route('classes.update', $schoolClass->id) }}" method="POST" class="mt-5">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="level" class="block text-sm font-medium text-gray-700">Tingkat (Level)</label>
                            <select id="level" name="level" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                <option value="">Pilih Tingkat</option>
                                <option value="10" {{ old('level', $schoolClass->level) == '10' ? 'selected' : '' }}>10
                                </option>
                                <option value="11" {{ old('level', $schoolClass->level) == '11' ? 'selected' : '' }}>11
                                </option>
                                <option value="12" {{ old('level', $schoolClass->level) == '12' ? 'selected' : '' }}>12
                                </option>
                            </select>
                            @error('level')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                            <input type="text" name="name" id="name" autocomplete="off" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('name', $schoolClass->name) }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-3">
                        <a href="{{ route('classes.index') }}"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Batal</a>
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection