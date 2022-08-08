<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
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

    public function listing()
    {
        $hostings = Hosting::query()
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
                $hosting->title = $request->title;
                $hosting->description = $request->description;
                $hosting->price = $request->price;
                $hosting->number_of_guest = $request->number_of_guest;
                $hosting->location = $request->location;
                $hosting->hosting_type = $request->type;
                $hosting->status = $request->status;
                $hosting->save();

                session()->flash('flash.banner', 'Yay for free components!');
                session()->flash('flash.bannerStyle', 'success');

                return redirect()->route('hosting.listing');
            }
        }

        return view('hosting.form', [
            'title' => 'New',
            'submit' => route('hosting.create'),
            'hosting_status' => $this->hosting_status,
            'hosting_type' => $this->hosting_type,
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
        ]);
    }

    public function api_listing()
    {
        $hostings = Hosting::query()
            ->where('status', '!=', 'deleted')
            ->orderBy('created_at', 'desc')
            ->get();

        $print = json_encode($hostings, JSON_PRETTY_PRINT);

        return response($print, 200)
            ->header('Content-Type', 'application/json');
    }
}
