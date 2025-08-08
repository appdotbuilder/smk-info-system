<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SchoolSystemSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create Academic Year
        $academicYear = AcademicYear::create([
            'name' => '2024/2025',
            'start_date' => '2024-07-01',
            'end_date' => '2025-06-30',
            'is_active' => true,
        ]);

        // Create Administrator
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'administrator',
            'phone' => '081234567890',
            'address' => 'Jl. Pendidikan No. 1, Jakarta',
            'is_active' => true,
        ]);

        // Create Teachers
        $teacher1 = User::create([
            'name' => 'Budi Santoso, S.Pd',
            'email' => 'budi.santoso@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'phone' => '081234567891',
            'address' => 'Jl. Guru No. 10, Jakarta',
            'is_active' => true,
        ]);

        Teacher::create([
            'user_id' => $teacher1->id,
            'employee_number' => 'EMP001',
            'nip' => '196801012000031001',
            'nuptk' => '1234567890123456',
            'birth_date' => '1968-01-01',
            'birth_place' => 'Jakarta',
            'gender' => 'male',
            'education_level' => 'S1 Teknik Informatika',
            'subject_specialization' => 'Pemrograman',
            'hire_date' => '2000-03-01',
            'employment_status' => 'permanent',
        ]);

        $teacher2 = User::create([
            'name' => 'Siti Nurhaliza, S.Pd',
            'email' => 'siti.nurhaliza@smk.sch.id',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'phone' => '081234567892',
            'address' => 'Jl. Pendidik No. 15, Jakarta',
            'is_active' => true,
        ]);

        Teacher::create([
            'user_id' => $teacher2->id,
            'employee_number' => 'EMP002',
            'nip' => '197205152005012001',
            'nuptk' => '2345678901234567',
            'birth_date' => '1972-05-15',
            'birth_place' => 'Bandung',
            'gender' => 'female',
            'education_level' => 'S1 Bahasa Indonesia',
            'subject_specialization' => 'Bahasa Indonesia',
            'hire_date' => '2005-01-15',
            'employment_status' => 'permanent',
        ]);

        // Create Subjects
        $subjects = [
            ['name' => 'Matematika', 'code' => 'MTK', 'type' => 'core', 'credits' => 4],
            ['name' => 'Bahasa Indonesia', 'code' => 'BIND', 'type' => 'core', 'credits' => 3],
            ['name' => 'Bahasa Inggris', 'code' => 'BING', 'type' => 'core', 'credits' => 3],
            ['name' => 'Sejarah Indonesia', 'code' => 'SEJ', 'type' => 'core', 'credits' => 2],
            ['name' => 'Pemrograman Web', 'code' => 'PWEB', 'type' => 'specialization', 'credits' => 6],
            ['name' => 'Jaringan Komputer', 'code' => 'JKom', 'type' => 'specialization', 'credits' => 6],
            ['name' => 'Database', 'code' => 'DB', 'type' => 'specialization', 'credits' => 4],
            ['name' => 'Sistem Operasi', 'code' => 'SO', 'type' => 'specialization', 'credits' => 4],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }

        // Create Classes
        $classes = [
            ['name' => 'X TKJ 1', 'grade' => 'X', 'major' => 'TKJ', 'capacity' => 36],
            ['name' => 'X TKJ 2', 'grade' => 'X', 'major' => 'TKJ', 'capacity' => 36],
            ['name' => 'XI TKJ 1', 'grade' => 'XI', 'major' => 'TKJ', 'capacity' => 32],
            ['name' => 'XI TKJ 2', 'grade' => 'XI', 'major' => 'TKJ', 'capacity' => 32],
            ['name' => 'XII TKJ 1', 'grade' => 'XII', 'major' => 'TKJ', 'capacity' => 30],
            ['name' => 'XII TKJ 2', 'grade' => 'XII', 'major' => 'TKJ', 'capacity' => 30],
            ['name' => 'X MM 1', 'grade' => 'X', 'major' => 'MM', 'capacity' => 36],
            ['name' => 'XI MM 1', 'grade' => 'XI', 'major' => 'MM', 'capacity' => 32],
            ['name' => 'XII MM 1', 'grade' => 'XII', 'major' => 'MM', 'capacity' => 30],
        ];

        foreach ($classes as $classData) {
            SchoolClass::create([
                'name' => $classData['name'],
                'grade' => $classData['grade'],
                'major' => $classData['major'],
                'homeroom_teacher_id' => $teacher1->id,
                'academic_year_id' => $academicYear->id,
                'capacity' => $classData['capacity'],
            ]);
        }

        // Create Sample Students
        $class = SchoolClass::where('name', 'XI TKJ 1')->first();
        
        for ($i = 1; $i <= 5; $i++) {
            $student = User::create([
                'name' => "Siswa {$i}",
                'email' => "siswa{$i}@student.smk.sch.id",
                'password' => Hash::make('password'),
                'role' => 'student',
                'phone' => "08123456789{$i}",
                'address' => "Jl. Siswa No. {$i}, Jakarta",
                'is_active' => true,
            ]);

            $paddedNumber = str_pad((string)$i, 4, '0', STR_PAD_LEFT);
            $birthMonth = str_pad((string)random_int(1, 9), 2, '0', STR_PAD_LEFT);
            $birthDay = str_pad((string)random_int(10, 28), 2, '0', STR_PAD_LEFT);

            Student::create([
                'user_id' => $student->id,
                'student_number' => "2024{$paddedNumber}",
                'nis' => "1234{$paddedNumber}",
                'nisn' => "987654321{$i}",
                'class_id' => $class->id,
                'birth_date' => "2006-{$birthMonth}-{$birthDay}",
                'birth_place' => 'Jakarta',
                'gender' => $i % 2 == 0 ? 'female' : 'male',
                'religion' => 'Islam',
                'parent_info' => json_encode([
                    'father_name' => "Ayah Siswa {$i}",
                    'mother_name' => "Ibu Siswa {$i}",
                    'father_phone' => "08111111111{$i}",
                    'mother_phone' => "08222222222{$i}",
                ]),
                'enrollment_date' => '2024-07-01',
                'status' => 'active',
            ]);
        }

        // Create Sample Parents
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Orang Tua {$i}",
                'email' => "parent{$i}@parent.smk.sch.id",
                'password' => Hash::make('password'),
                'role' => 'parent',
                'phone' => "08333333333{$i}",
                'address' => "Jl. Orang Tua No. {$i}, Jakarta",
                'is_active' => true,
            ]);
        }
    }
}