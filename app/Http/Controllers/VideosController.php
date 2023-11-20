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
        $clients = Client::all();
        $this->calcClientProfitForFactory();
        $videos = Video::orderBy('created_at', 'desc')->paginate(8);
        return view('videos.display', [
            'videos' => $videos,
            'clients' => $clients,
            'totalVideos' => $totalVideosThisMonth,
            'totalProfit' => $this->calcVideoProfit(),
            'numberOfClients' => $numberOfClients,
        ]);
    }
    public function calcVideoProfit()
    {
        $videos = Video::all();
        $profit = 0;
        foreach($videos as $video)
        {
            $profit += $video->profit;
        }
        return $profit;
    }
    public function calcClientProfitForFactory()
    {
        $clients = Client::all();
        $profit = 0;
        foreach ($clients as $client)
        {
            $videos = Video::where('client_id', '=', $client->id)->get();
            foreach ($videos as $video)
            {
                $profit += $video->profit;
            }
            $client['totalProfit'] = $profit;
            $client->save();
            $profit = 0;
        }
    }
    public function register()
    {
        $request = request();
        $updateClientProfit = Client::findOrFail($request['client_id']);
        $updateClientProfit['totalProfit'] += $request['profit'];
        $updateClientProfit->save();

        Video::create([
            'theme' => $request['theme'],
            'client_id' => $request['client_id'],
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
