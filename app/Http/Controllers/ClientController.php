<?php

namespace App\Http\Controllers;
use App\Models\Client;

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
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect()->back();
    }
}
