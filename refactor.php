<?php

$basePath = __DIR__;

$moves = [
    // Controllers -> Admin
    'app/Http/Controllers/Users/ListUsersController.php' => 'app/Http/Controllers/Admin/Users/ListUsersController.php',
    'app/Http/Controllers/Users/StoreUserController.php' => 'app/Http/Controllers/Admin/Users/StoreUserController.php',
    
    'app/Http/Controllers/Students/ListStudentsController.php' => 'app/Http/Controllers/Admin/Students/ListStudentsController.php',
    'app/Http/Controllers/Students/ShowStudentController.php' => 'app/Http/Controllers/Admin/Students/ShowStudentController.php',
    'app/Http/Controllers/Students/StoreStudentController.php' => 'app/Http/Controllers/Admin/Students/StoreStudentController.php',
    'app/Http/Controllers/Students/DeleteStudentController.php' => 'app/Http/Controllers/Admin/Students/DeleteStudentController.php',
    
    'app/Http/Controllers/Teachers/ListTeachersController.php' => 'app/Http/Controllers/Admin/Teachers/ListTeachersController.php',
    'app/Http/Controllers/Teachers/ShowTeacherController.php' => 'app/Http/Controllers/Admin/Teachers/ShowTeacherController.php',
    'app/Http/Controllers/Teachers/StoreTeacherController.php' => 'app/Http/Controllers/Admin/Teachers/StoreTeacherController.php',

    'app/Http/Controllers/Classes/ListClassesController.php' => 'app/Http/Controllers/Admin/Classes/ListClassesController.php',
    'app/Http/Controllers/Classes/ShowClassController.php' => 'app/Http/Controllers/Admin/Classes/ShowClassController.php',
    'app/Http/Controllers/Classes/StoreClassController.php' => 'app/Http/Controllers/Admin/Classes/StoreClassController.php',
    'app/Http/Controllers/Classes/StoreSectionController.php' => 'app/Http/Controllers/Admin/Classes/StoreSectionController.php',

    'app/Http/Controllers/Subjects/ListSubjectsController.php' => 'app/Http/Controllers/Admin/Subjects/ListSubjectsController.php',
    'app/Http/Controllers/Subjects/StoreSubjectController.php' => 'app/Http/Controllers/Admin/Subjects/StoreSubjectController.php',
    'app/Http/Controllers/Subjects/AssignTeacherToSubjectController.php' => 'app/Http/Controllers/Admin/Subjects/AssignTeacherToSubjectController.php',

    // Controllers -> Teacher
    'app/Http/Controllers/Attendance/MarkAttendanceController.php' => 'app/Http/Controllers/Teacher/Attendance/MarkAttendanceController.php',
    'app/Http/Controllers/Grades/StoreExamController.php' => 'app/Http/Controllers/Teacher/Grades/StoreExamController.php',
    'app/Http/Controllers/Grades/RecordGradesController.php' => 'app/Http/Controllers/Teacher/Grades/RecordGradesController.php',
    'app/Http/Controllers/Assignments/StoreAssignmentController.php' => 'app/Http/Controllers/Teacher/Assignments/StoreAssignmentController.php',
    'app/Http/Controllers/Assignments/ReviewSubmissionController.php' => 'app/Http/Controllers/Teacher/Assignments/ReviewSubmissionController.php',

    // Controllers -> Student
    'app/Http/Controllers/Assignments/SubmitAssignmentController.php' => 'app/Http/Controllers/Student/Assignments/SubmitAssignmentController.php',

    // Controllers -> Shared
    'app/Http/Controllers/Auth/LoginController.php' => 'app/Http/Controllers/Shared/Auth/LoginController.php',
    'app/Http/Controllers/Auth/LogoutController.php' => 'app/Http/Controllers/Shared/Auth/LogoutController.php',
    'app/Http/Controllers/Attendance/ListAttendanceController.php' => 'app/Http/Controllers/Shared/Attendance/ListAttendanceController.php',
    'app/Http/Controllers/Grades/ListGradesController.php' => 'app/Http/Controllers/Shared/Grades/ListGradesController.php',
    'app/Http/Controllers/Assignments/ListAssignmentsController.php' => 'app/Http/Controllers/Shared/Assignments/ListAssignmentsController.php',

    // Actions
    'app/Actions/Users/CreateUserAction.php' => 'app/Actions/Admin/Users/CreateUserAction.php',
    'app/Actions/Students/RegisterStudentAction.php' => 'app/Actions/Admin/Students/RegisterStudentAction.php',
    'app/Actions/Teachers/RegisterTeacherAction.php' => 'app/Actions/Admin/Teachers/RegisterTeacherAction.php',
    'app/Actions/Attendance/MarkBulkAttendanceAction.php' => 'app/Actions/Teacher/Attendance/MarkBulkAttendanceAction.php',
    'app/Actions/Auth/LoginAction.php' => 'app/Actions/Shared/Auth/LoginAction.php',

    // DTOs
    'app/DTO/Users/CreateUserDTO.php' => 'app/DTO/Admin/Users/CreateUserDTO.php',
    'app/DTO/Students/RegisterStudentDTO.php' => 'app/DTO/Admin/Students/RegisterStudentDTO.php',
    'app/DTO/Teachers/RegisterTeacherDTO.php' => 'app/DTO/Admin/Teachers/RegisterTeacherDTO.php',
    'app/DTO/Auth/LoginDTO.php' => 'app/DTO/Shared/Auth/LoginDTO.php',

    // Requests
    'app/Http/Requests/Users/CreateUserRequest.php' => 'app/Http/Requests/Admin/Users/CreateUserRequest.php',
    'app/Http/Requests/Students/RegisterStudentRequest.php' => 'app/Http/Requests/Admin/Students/RegisterStudentRequest.php',
    'app/Http/Requests/Teachers/RegisterTeacherRequest.php' => 'app/Http/Requests/Admin/Teachers/RegisterTeacherRequest.php',
    'app/Http/Requests/Auth/LoginRequest.php' => 'app/Http/Requests/Shared/Auth/LoginRequest.php',
];

$namespaceReplacements = [
    // Controllers
    'App\Http\Controllers\Users' => 'App\Http\Controllers\Admin\Users',
    'App\Http\Controllers\Students' => 'App\Http\Controllers\Admin\Students',
    'App\Http\Controllers\Teachers' => 'App\Http\Controllers\Admin\Teachers',
    'App\Http\Controllers\Classes' => 'App\Http\Controllers\Admin\Classes',
    'App\Http\Controllers\Subjects' => 'App\Http\Controllers\Admin\Subjects',
    'App\Http\Controllers\Attendance' => 'App\Http\Controllers\Shared\Attendance', // Need to handle specific files manually
    'App\Http\Controllers\Grades' => 'App\Http\Controllers\Shared\Grades', // Need to handle specific files manually
    'App\Http\Controllers\Assignments' => 'App\Http\Controllers\Shared\Assignments', // Need to handle specific files manually
    'App\Http\Controllers\Auth' => 'App\Http\Controllers\Shared\Auth',

    // Actions
    'App\Actions\Users' => 'App\Actions\Admin\Users',
    'App\Actions\Students' => 'App\Actions\Admin\Students',
    'App\Actions\Teachers' => 'App\Actions\Admin\Teachers',
    'App\Actions\Attendance' => 'App\Actions\Teacher\Attendance',
    'App\Actions\Auth' => 'App\Actions\Shared\Auth',

    // DTOs
    'App\DTO\Users' => 'App\DTO\Admin\Users',
    'App\DTO\Students' => 'App\DTO\Admin\Students',
    'App\DTO\Teachers' => 'App\DTO\Admin\Teachers',
    'App\DTO\Auth' => 'App\DTO\Shared\Auth',

    // Requests
    'App\Http\Requests\Users' => 'App\Http\Requests\Admin\Users',
    'App\Http\Requests\Students' => 'App\Http\Requests\Admin\Students',
    'App\Http\Requests\Teachers' => 'App\Http\Requests\Admin\Teachers',
    'App\Http\Requests\Auth' => 'App\Http\Requests\Shared\Auth',
];

// Instead of global string replace for namespaces, let's derive the new namespace from the new path.
function getNamespaceFromPath($path) {
    $dir = dirname($path);
    $dir = str_replace('app/', 'App/', $dir);
    return str_replace('/', '\\', $dir);
}

foreach ($moves as $old => $new) {
    if (file_exists($basePath . '/' . $old)) {
        $oldAbs = $basePath . '/' . $old;
        $newAbs = $basePath . '/' . $new;
        
        if (!is_dir(dirname($newAbs))) {
            mkdir(dirname($newAbs), 0777, true);
        }
        
        $content = file_get_contents($oldAbs);
        
        $oldNamespace = getNamespaceFromPath($old);
        $newNamespace = getNamespaceFromPath($new);
        
        // Update namespace declaration
        $content = str_replace("namespace $oldNamespace;", "namespace $newNamespace;", $content);
        
        // Save the updated file
        file_put_contents($oldAbs, $content);
        
        // Move the file
        rename($oldAbs, $newAbs);
        echo "Moved $old to $new\n";
    }
}

// Now we need to update `use` statements across all files in app/
function updateUses($dir, $moves) {
    global $basePath;
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            $originalContent = $content;
            
            foreach ($moves as $old => $new) {
                // Remove .php and app/
                $oldClass = str_replace(['app/', '.php'], ['App/', ''], $old);
                $oldClass = str_replace('/', '\\', $oldClass);
                
                $newClass = str_replace(['app/', '.php'], ['App/', ''], $new);
                $newClass = str_replace('/', '\\', $newClass);
                
                $content = str_replace("use $oldClass;", "use $newClass;", $content);
                // Handle new ...() calls if they don't use use statements
                $content = preg_replace("/\\\\?" . preg_quote($oldClass, '/') . "([^a-zA-Z0-9_])/m", "\\$newClass$1", $content);
            }
            
            if ($content !== $originalContent) {
                file_put_contents($file->getPathname(), $content);
                echo "Updated uses in " . $file->getPathname() . "\n";
            }
        }
    }
}

updateUses($basePath . '/app', $moves);
updateUses($basePath . '/routes', $moves);

echo "Done.\n";
