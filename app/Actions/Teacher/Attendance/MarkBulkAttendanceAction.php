<?php

namespace App\Actions\Teacher\Attendance;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class MarkBulkAttendanceAction
{
    public function execute(int $sectionId, string $date, array $records): int
    {
        return DB::transaction(function () use ($sectionId, $date, $records) {
            $count = 0;

            foreach ($records as $record) {
                Attendance::updateOrCreate(
                    [
                        'student_id' => $record['student_id'],
                        'date' => $date,
                    ],
                    [
                        'section_id' => $sectionId,
                        'status' => $record['status'],
                        'remarks' => $record['remarks'] ?? null,
                    ]
                );
                $count++;
            }

            return $count;
        });
    }
}
