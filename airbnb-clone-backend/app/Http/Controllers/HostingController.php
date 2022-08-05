<?php

namespace App\Http\Controllers;

use App\Models\Hosting;
use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function listing()
    {
        ##$hostings = Hosting::all();

        $hostings = array_fill(0, 10, null);

        $now = now();

        return view('hosting.listing', compact('hostings', 'now'));
    }
}
