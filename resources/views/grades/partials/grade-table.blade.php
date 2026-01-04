<div class="overflow-hidden shadow ring-1 ring-gray-200 md:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nama Siswa</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 w-32">Nilai (0-100)</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Keterangan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($students as $index => $student)
                @php
                    // Filter grade for this student and this type
                    // Note: This logic assumes one grade entry per type for simplicity in this MVP. 
                    // In a real app, 'daily' might have multiple entries. 
                    // Here we will treat it as a single 'Average Daily Score' input or just one slot.
                    $grade = $grades->where('student_id', $student->id)->where('type', $type)->first();
                    // We need a unique index for the form array. 
                    // Simple approach: combine type and student_id in the key or just use a counter.
                    // But we want to submit ALL tabs? No, form submission will capture all inputs if they are in DOM.
                    // However, we need to make sure array keys don't collide if we submit all.
                    // Let's use a composite key approach for the array name: grades[type_studentId]
                    // But the controller expects grades array.
                    // Let's modify the controller expectation or use Hidden Inputs to carry the type.
                    
                    // Revised Strategy:
                    // We will loop through all students for THIS type.
                    // The input name will be grades[{{ $type }}_{{ $student->id }}]...
                    // Wait, Controller validate rule: 'grades.*.type' => 'required'.
                    // So we can structure the array as:
                    // grades[Index][student_id]
                    // grades[Index][type]
                    // grades[Index][score]
                    
                    $formIndex = $type . '_' . $student->id; 
                @endphp
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        {{ $student->name }}
                        <input type="hidden" name="grades[{{ $formIndex }}][student_id]" value="{{ $student->id }}">
                        <input type="hidden" name="grades[{{ $formIndex }}][type]" value="{{ $type }}">
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <input type="number" name="grades[{{ $formIndex }}][score]" min="0" max="100" step="0.01"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            value="{{ $grade ? $grade->score : '' }}" placeholder="0">
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <input type="text" name="grades[{{ $formIndex }}][description]"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            value="{{ $grade ? $grade->description : '' }}" placeholder="Opsional">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
