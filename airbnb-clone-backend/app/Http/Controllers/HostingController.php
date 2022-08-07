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
        $hostings = Hosting::all();

        return view('hosting.listing', compact('hostings'));
    }

    public function create(Request $request)
    {

        if ($request->isMethod('post')) {

            $validation = $request->validate([
                'name' => 'required',
            ]);

            if ($validation) {
                $hosting = new Hosting();
                $hosting->title = $request->name;
                $hosting->description = $request->description;
                $hosting->price = $request->price;
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
}
