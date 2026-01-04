<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define levels and their mapping
        // 1-6 : SD
        // 7-9 : SMP (Level 1-3)
        // 10-12 : SMA (Level 1-3)
        // Creating 2 parallel classes for each level (Sequence 1 and 2)

        $levels = range(1, 12);

        foreach ($levels as $level) {

            // Create 1 class per level with format "Kelas X [SD/SMP/SMA]"
            // Determine Name Prefix
            $namePrefix = '';
            if ($level >= 1 && $level <= 6) {
                $displayName = "Kelas " . $level . " SD";
            } elseif ($level >= 7 && $level <= 9) {
                $displayName = "Kelas " . ($level - 6) . " SMP";
            } elseif ($level >= 10 && $level <= 12) {
                $displayName = "Kelas " . ($level - 9) . " SMA";
            }

            SchoolClass::firstOrCreate([
                'level' => (string) $level,
                'name' => $displayName,
            ]);
        }
    }
}
