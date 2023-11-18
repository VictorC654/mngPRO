<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Client;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{

    public function display(): View
    {
        $totalVideosThisMonth = Video::count();
        $numberOfClients = Client::count();
        $videos = Video::orderBy('created_at', 'desc')->paginate(8);
        $clients = Client::all();
        return view('videos.display', [
            'videos' => $videos,
            'clients' => $clients,
            'totalVideos' => $totalVideosThisMonth,
            'totalProfit' => $this->calcProfit(),
            'numberOfClients' => $numberOfClients,
        ]);
    }
    public function calcProfit()
    {
        $videos = Video::all();
        $profit = 0;
        foreach($videos as $video)
        {
            $profit += $video->profit;
        }
        return $profit;
    }
    public function register()
    {
        $request = request();
        Video::create([
            'theme' => $request['theme'],
            'client_id' => $request['client_id'],
            'client' => Client::where('id', $request['client_id'])->first()->name,
            'profit' => $request['profit'],
            'duration_in_minutes' => $request['duration_in_minutes'],
        ])->save();
        return redirect('/videos');
    }
    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect()->back();
    }
}
