<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HostingController extends Controller
{
    public $hosting_status = [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'unlisted' => 'Unlisted',
        'deleted' => 'Deleted',
    ];

    public $hosting_type = [
        'shared' => 'Shared',
        'dedicated' => 'Dedicated',
    ];

    public $room_status = [
        'available' => 'Available',
        'not_available' => 'Not Available',
    ];

    public function listing()
    {
        $hostings = Hosting::query()
            ->where('user_id', auth()->user()->id)
            ->where('status', '!=', 'deleted')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('hosting.listing', compact('hostings'));
    }

    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            $validation = $request->validate([
                'title' => 'required',
            ]);

            if ($validation) {
                $hosting = new Hosting();
                $hosting->user_id = auth()->user()->id;
                $hosting->title = $request->title;
                $hosting->description = $request->description;
                $hosting->price = $request->price;
                $hosting->number_of_guest = $request->number_of_guest;
                $hosting->location = $request->location;
                $hosting->hosting_type = $request->type;
                $hosting->status = $request->status;
                $hosting->save();

                $room_name = $request->room_name;
                for ($i = 0; $i < count($room_name); $i++) {
                    $room = new Rooms();
                    $room->name = $room_name[$i];
                    $room->description = $request->room_description[$i];
                    $room->price = $request->room_price[$i];
                    $room->bed = $request->room_bed[$i];
                    $room->status = $request->room_status[$i];
                    $room->hosting_id = $hosting->id;
                    $room->save();
                }

                session()->flash('flash.banner', 'Successfully created new hosting');
                session()->flash('flash.bannerStyle', 'success');

                return redirect()->route('hosting.listing');
            }
        }

        return view('hosting.form', [
            'title' => 'New',
            'submit' => route('hosting.create'),
            'hosting_status' => $this->hosting_status,
            'hosting_type' => $this->hosting_type,
            'room_status' => $this->room_status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $hosting = Hosting::find($id);

        if ($request->isMethod('post')) {
            $validation = $request->validate([
                'title' => 'required',
            ]);
            if ($validation) {
                $hosting->title = $request->title;
                $hosting->description = $request->description;
                $hosting->price = $request->price;
                $hosting->number_of_guest = $request->number_of_guest;
                $hosting->location = $request->location;
                $hosting->hosting_type = $request->type;
                $hosting->status = $request->status;
                $hosting->save();

                $room_name = $request->room_name;
                for ($i = 0; $i < count($room_name); $i++) {
                    if ($request->room_id[$i]) {
                        $room = Rooms::find($request->room_id[$i]);
                        $room->name = $room_name[$i];
                        $room->description = $request->room_description[$i];
                        $room->price = $request->room_price[$i];
                        $room->bed = $request->room_bed[$i];
                        $room->status = $request->room_status[$i];
                        $room->hosting_id = $hosting->id;
                        $room->update();
                    } else {
                        $room = new Rooms();
                        $room->name = $room_name[$i];
                        $room->description = $request->room_description[$i];
                        $room->price = $request->room_price[$i];
                        $room->bed = $request->room_bed[$i];
                        $room->status = $request->room_status[$i];
                        $room->hosting_id = $hosting->id;
                        $room->save();
                    }
                }

                session()->flash('flash.banner', 'Succesfully updated hosting!');
                session()->flash('flash.bannerStyle', 'success');
                return redirect()->route('hosting.listing');
            }
        }


        return view('hosting.form', [
            'title' => 'Update',
            'submit' => route('hosting.update', $id),
            'hosting' => $hosting,
            'hosting_status' => $this->hosting_status,
            'hosting_type' => $this->hosting_type,
            'room_status' => $this->room_status,
        ]);
    }

    public function api_listing()
    {
        $hostings = Hosting::query()->with('rooms')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        $print = json_encode($hostings, JSON_PRETTY_PRINT);

        return response($print, 200)
            ->header('Content-Type', 'application/json');
    }
}
