<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $events = Calendar::get();
        return view('index', compact('events'));
    }

    public function store(Request $request)
    {
        $event = Calendar::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return response()->json($event);
    }

    public function update(Request $request, $id)
    {
        $eventShow = Calendar::findOrFail($id);
        $event = $eventShow->fill([
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);
        $event->save();

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Calendar::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
