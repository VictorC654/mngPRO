<?php

namespace App\Models;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function videos()
    {
//        dd($this->hasMany(Video::class));
    }
}
