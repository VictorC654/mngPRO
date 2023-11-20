<?php

namespace App\Models;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function videos() : HasMany
    {
        return $this->hasMany(Video::class);
    }
    public function calcProfit()
    {
        $videos = $this->videos();
        foreach ($videos as $video)
        {
            dd($video->profit);
        }
    }
}
