<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Notifications\CoursePurchased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function purchase(Course $course)
    {
        // Add your purchase logic here
        // For example, create a course enrollment, process payment, etc.

        // After successful purchase, send notification
        Auth::user()->notify(new CoursePurchased($course));

        return redirect()->route('courses.show', $course)
            ->with('success', 'Kurs wurde erfolgreich gekauft.');
    }
}
