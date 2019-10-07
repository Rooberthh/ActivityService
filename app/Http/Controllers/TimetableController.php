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

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'sometimes',
            ]);

            $Timetable = Timetable::find($id);

            $Timetable->update(['name' => $request->get('name')]);

            return response($Timetable, 200);
        }

    }
