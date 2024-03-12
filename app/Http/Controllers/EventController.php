<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view("dashboard", compact('events'));
    }
    public function store(Request $request, User $user, Category $category){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'location' => 'required',
            'available_tickets' => 'required',
            'price' => 'required',
            'auto_accept' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'location' => $request->location,
            'available_tickets' => $request->available_tickets,
            'price' => $request->price,
            'auto_accept' => $request->auto_accept,
            'organiser' => $user->id,
            'category' => $category->id
        ];
        Event::create($data); 

        return redirect()->route('dashboard')->with('success', 'Event added successfully');
    }

    public function valid(Event $event){
        $event->update([
            'is_valid' => true
        ]);

        return redirect()->route('dashboard')->with('success', 'Event is valid');
    }

    public function update(Event $event, Request $request, Category $category){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'location' => 'required',
            'available_tickets' => 'required',
            'price' => 'required',
            'auto_accept' => 'required',
            'category' => 'required'
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'location' => $request->location,
            'available_tickets' => $request->available_tickets,
            'price' => $request->price,
            'auto_accept' => $request->auto_accept,
            'category' => $category->id
        ]);

        return redirect()->route('dashboard')->with('success', 'Event edited successfully');
    }

    public function delete(Event $event){
        $event->delete();
        // dd($route);
        return redirect()->route('homepage')->with('success','Event moved to bin');
    }
    public function restore(Event $event){
        $event->restore();
        return redirect()->route('dashboard')->with('success', 'Event restored successfully');

    }

    public function destroy(Event $event){
        $event->forceDelete();
        // dd($event);
        return redirect()->route('homepage')->with('success','Event deleted permanently');
    }

}
