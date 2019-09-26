<?php

    namespace App\Http\Controllers;
    
    use App\Activity;
    use Illuminate\Http\Request;

    class ActivityController extends Controller
    {
        public function index()
        {
            return Activity::all();
        }

        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'category_id' => 'required'
            ]);

            $activity = Activity::create($request->all());

            return response($activity, 201);
        }

        public function destroy($id)
        {
            $activity = Activity::find($id);
            $activity->delete();

            return response("Activity has been deleted", 204);
        }

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
