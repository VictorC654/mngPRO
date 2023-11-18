<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function register()
    {
        $request = request();
        Client::create([
            'name' => $request['clientName'],
        ])->save();
        return redirect()->back();
    }
}
