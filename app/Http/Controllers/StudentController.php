<?php

namespace App\Http\Controllers;

use App\Models\Lookup\Ethnicity;
use App\Models\Lookup\RelationshipType;
use App\Models\Lookup\State;
use App\Models\Lookup\Title;
use App\Models\Lookup\School;
use App\Models\Lookup\FirstLanguage;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    public function search() {
        $students = Student::orderBy('fname')->get();
        return view('search', [
            'students' => $students
        ]);
    }

    public function show(Request $request) {
        $studentId = $request->input('student');
        $student = Student::with('parent1', 'parent2')->find($studentId);

        return view('profile', [
            'student' => $student
        ]);
    }

    public function create() {
        $schools = School::orderBy('name')->get();
        $firstLanguages = FirstLanguage::all();
        $ethnicities = Ethnicity::all();
        $relationshipTypes = RelationshipType::all();
        $titles = Title::all();
        $states = State::all();

        return view('register', [
            'schools' => $schools,
            'firstLanguages' => $firstLanguages,
            'ethnicities' => $ethnicities,
            'relationshipTypes' => $relationshipTypes,
            'titles' => $titles,
            'states' => $states
        ]);
    }

    public function store(Request $request) {

    }

}
