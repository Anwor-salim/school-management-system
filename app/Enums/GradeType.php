<?php

namespace App\Enums;

enum GradeType: string
{
    case MIDTERM = 'midterm';
    case FINAL = 'final';
    case QUIZ = 'quiz';
    case HOMEWORK = 'homework';
}
