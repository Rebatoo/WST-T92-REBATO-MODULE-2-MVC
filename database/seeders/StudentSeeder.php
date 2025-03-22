<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $students = [
            ['name' => 'Juan Dela Cruz', 'email' => 'juan.delacruz@student.com'],
            ['name' => 'Maria Santos', 'email' => 'maria.santos@student.com'],
            ['name' => 'Jose Reyes', 'email' => 'jose.reyes@student.com'],
            ['name' => 'Ana Gonzales', 'email' => 'ana.gonzales@student.com'],
            ['name' => 'Pedro Garcia', 'email' => 'pedro.garcia@student.com'],
            ['name' => 'Sofia Rodriguez', 'email' => 'sofia.rodriguez@student.com'],
            ['name' => 'Miguel Torres', 'email' => 'miguel.torres@student.com'],
            ['name' => 'Isabella Cruz', 'email' => 'isabella.cruz@student.com'],
            ['name' => 'Gabriel Fernandez', 'email' => 'gabriel.fernandez@student.com'],
            ['name' => 'Emma Ramos', 'email' => 'emma.ramos@student.com'],
            ['name' => 'Lucas Mendoza', 'email' => 'lucas.mendoza@student.com'],
            ['name' => 'Sophia Lopez', 'email' => 'sophia.lopez@student.com'],
            ['name' => 'Diego Flores', 'email' => 'diego.flores@student.com'],
            ['name' => 'Olivia Perez', 'email' => 'olivia.perez@student.com'],
            ['name' => 'Mateo Rivera', 'email' => 'mateo.rivera@student.com'],
            ['name' => 'Valentina Gomez', 'email' => 'valentina.gomez@student.com'],
            ['name' => 'Daniel Morales', 'email' => 'daniel.morales@student.com'],
            ['name' => 'Camila Castro', 'email' => 'camila.castro@student.com'],
            ['name' => 'Adrian Santos', 'email' => 'adrian.santos@student.com'],
            ['name' => 'Victoria Reyes', 'email' => 'victoria.reyes@student.com'],
            ['name' => 'David Garcia', 'email' => 'david.garcia@student.com'],
            ['name' => 'Lucia Torres', 'email' => 'lucia.torres@student.com'],
            ['name' => 'Sebastian Cruz', 'email' => 'sebastian.cruz@student.com'],
            ['name' => 'Mia Fernandez', 'email' => 'mia.fernandez@student.com'],
            ['name' => 'Samuel Ramos', 'email' => 'samuel.ramos@student.com'],
            ['name' => 'Elena Lopez', 'email' => 'elena.lopez@student.com'],
            ['name' => 'Nicolas Flores', 'email' => 'nicolas.flores@student.com'],
            ['name' => 'Isabel Perez', 'email' => 'isabel.perez@student.com'],
            ['name' => 'Alejandro Rivera', 'email' => 'alejandro.rivera@student.com'],
            ['name' => 'Valeria Gomez', 'email' => 'valeria.gomez@student.com'],
            ['name' => 'Emilio Morales', 'email' => 'emilio.morales@student.com'],
            ['name' => 'Regina Castro', 'email' => 'regina.castro@student.com'],
            ['name' => 'Leonardo Santos', 'email' => 'leonardo.santos@student.com'],
            ['name' => 'Julia Reyes', 'email' => 'julia.reyes@student.com'],
            ['name' => 'Martin Garcia', 'email' => 'martin.garcia@student.com'],
            ['name' => 'Sara Torres', 'email' => 'sara.torres@student.com'],
            ['name' => 'Diego Cruz', 'email' => 'diego.cruz@student.com'],
            ['name' => 'Paula Fernandez', 'email' => 'paula.fernandez@student.com'],
            ['name' => 'Tomas Ramos', 'email' => 'tomas.ramos@student.com'],
            ['name' => 'Carolina Lopez', 'email' => 'carolina.lopez@student.com'],
            ['name' => 'Andres Flores', 'email' => 'andres.flores@student.com'],
            ['name' => 'Mariana Perez', 'email' => 'mariana.perez@student.com'],
            ['name' => 'Felipe Rivera', 'email' => 'felipe.rivera@student.com'],
            ['name' => 'Daniela Gomez', 'email' => 'daniela.gomez@student.com'],
            ['name' => 'Joaquin Morales', 'email' => 'joaquin.morales@student.com'],
            ['name' => 'Amanda Castro', 'email' => 'amanda.castro@student.com'],
            ['name' => 'Benjamin Santos', 'email' => 'benjamin.santos@student.com'],
            ['name' => 'Catalina Reyes', 'email' => 'catalina.reyes@student.com'],
            ['name' => 'Santiago Garcia', 'email' => 'santiago.garcia@student.com'],
            ['name' => 'Renata Torres', 'email' => 'renata.torres@student.com']
        ];

        foreach ($students as $student) {
            Student::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password123'), // Default password for all students
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}