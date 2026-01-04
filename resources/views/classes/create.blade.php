@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Form Tambah Kelas</h3>
            <div class="mt-2 text-sm text-gray-500">
                <p>Silakan isi informasi kelas baru. Nama kelas akan digenerate otomatis.</p>
            </div>
            
            <form action="{{ route('classes.store') }}" method="POST" class="mt-5" 
                  x-data="{ 
                      level: '{{ old('level') }}', 
                      sequence: '',
                      generateName() {
                          let parts = [];
                          let lvl = parseInt(this.level);
                          
                          if (lvl) {
                              if (lvl >= 1 && lvl <= 6) {
                                  parts.push('Kelas ' + lvl + ' SD');
                              } else if (lvl >= 7 && lvl <= 9) {
                                  parts.push('Kelas ' + (lvl - 6) + ' SMP');
                              } else if (lvl >= 10 && lvl <= 12) {
                                  parts.push('Kelas ' + (lvl - 9) + ' SMA');
                              } else {
                                  parts.push(this.level);
                              }
                          }
                          
                          if (this.sequence) parts.push(this.sequence);
                          return parts.join(' ');
                      }
                  }">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    
                    <!-- Level Selection -->
                    <div class="col-span-6 sm:col-span-3">
                        <label for="level" class="block text-sm font-medium text-gray-700">Tingkat (Level)</label>
                        <select id="level" name="level" x-model="level" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <option value="">Pilih</option>
                            <optgroup label="SD">
                                @foreach(range(1, 6) as $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="SMP">
                                @foreach(range(7, 9) as $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                            </optgroup>
                            <optgroup label="SMA/SMK">
                                @foreach(range(10, 12) as $i)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('level')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sequence Input -->
                    <div class="col-span-6 sm:col-span-3">
                         <label for="sequence" class="block text-sm font-medium text-gray-700">Nomor Urut</label>
                        <input type="number" id="sequence" x-model="sequence" min="1"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            placeholder="1">
                    </div>

                    <!-- Generated Name Preview/Input -->
                    <div class="col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Kelas (Otomatis)</label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">Preview</span>
                            <input type="text" name="name" id="name" required readonly
                                class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 bg-gray-100 focus:border-blue-500 focus:ring-blue-500 sm:text-sm cursor-not-allowed"
                                :value="generateName()">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Nama kelas terbentuk dari kombinasi Tingkat, Jurusan, dan Nomor.</p>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-3">
                    <a href="{{ route('classes.index') }}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Batal</a>
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection