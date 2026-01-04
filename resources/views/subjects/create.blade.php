@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Form Tambah Mata Pelajaran</h3>
                <div class="mt-2 text-sm text-gray-500">
                    <p>Silakan isi informasi mata pelajaran baru. Kode Mapel akan digenerate otomatis.</p>
                </div>

                <form action="{{ route('subjects.store') }}" method="POST" class="mt-5">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Mata Pelajaran</label>
                            <input type="text" name="name" id="name" autocomplete="off" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('name') }}" placeholder="Contoh: Matematika Wajib">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="kkm" class="block text-sm font-medium text-gray-700">KKM</label>
                            <input type="number" name="kkm" id="kkm" min="0" max="100" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                value="{{ old('kkm') }}" placeholder="75">
                            <p class="mt-1 text-xs text-gray-500">Nilai minimal kelulusan (0-100).</p>
                            @error('kkm')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-3">
                        <a href="{{ route('subjects.index') }}"
                            class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Batal</a>
                        <button type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection