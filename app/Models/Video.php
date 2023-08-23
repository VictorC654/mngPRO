<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Video extends Model
{
    use HasFactory;
    protected $fillable = ['theme', 'client_id', 'profit', 'duration_in_minutes','client'];

//    public function client()
//    {
//        return $this->belongsTo(Client::class, 'id');
//    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }
}
