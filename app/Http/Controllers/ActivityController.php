<?php

    namespace App\Http\Controllers;
    
    use App\Activity;
    use App\Timetable;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Validation\ValidationException;
    use Laravel\Lumen\Http\ResponseFactory;

    class ActivityController extends Controller
    {
        public function index()
        {
            return Activity::all();
        }

        /**
         * @param Request $request
         * @param $category
         * @param $timetable
         * @return Response|ResponseFactory
         * @throws ValidationException
         */
        public function store(Request $request, $category, $timetable)
        {
            $timetable = Timetable::find($timetable);

            $this->validate($request, [
                'name' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'category_id' => 'required'
            ]);

            $activity = $timetable->addActivity([
                'name' => $request->get('name'),
                'startDate' => $request->get('startDate'),
                'endDate' => $request->get('endDate'),
                'category_id' => $category
            ]);

            return response($activity, 201);
        }

        /**
         * @param $id
         * @return Response|ResponseFactory
         */
        public function destroy($id)
        {
            $activity = Activity::find($id);

            $activity->delete();
            return response("Activity has been deleted", 204);
        }

        /**
         * @param Request $request
         * @param $id
         * @return Response|ResponseFactory
         * @throws ValidationException
         */
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'category_id' => 'required'
            ]);

            $activity = Activity::find($id);

            $activity->update([
                'name' => $request->get('name'),
                'startDate' => $request->get('startDate'),
                'endDate' => $request->get('endDate'),
                'category_id' => $request->get('category_id')
            ]);

            return response($activity, 200);
        }
    }
