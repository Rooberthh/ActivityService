<?php


    namespace App\Http\Controllers;

    use App\Activity;
    use App\Timetable;
    use Illuminate\Http\Request;

    class TimetableController extends Controller
    {
        public function index()
        {
            return Timetable::all();
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
            ]);

            $Timetable = Timetable::create($request->all());

            return response($Timetable, 201);
        }

    }
