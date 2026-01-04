@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Mata Pelajaran</h3>

                <form action="{{ route('subjects.update', $subject->id) }}" method="POST" class="mt-5">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label for="code" class="block text-sm font-medium text-gray-700">Kode Mapel</label>
                            <input type="text" name="code" id="code"
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm cursor-not-allowed"
                                value="{{ $subject->code }}" readonly>
                            <p class="mt-1 text-xs text-gray-500">Kode tidak dapat diubah.</p>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                            <input type="text" name="name" id="name" autocomplete="off" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('name', $subject->name) }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="kkm" class="block text-sm font-medium text-gray-700">KKM</label>
                            <input type="number" name="kkm" id="kkm" min="0" max="100" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('kkm', $subject->kkm) }}">
                            @error('kkm')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-3">
                        <a href="{{ route('subjects.index') }}"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Batal</a>
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection