<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable =['title','company','location','website','email','description','tag'];

    public static function create(array $array)
    {
    }

    public function scopeFilter($query ,array $filters )
    {
        if ($filters['tag'] ?? false){
            $query->where('tag','like','%'.request('tag').'%');
        }

        if ($filters['search'] ?? false){
            $query->where('title','like','%'.request('search').'%')
            ->orwhere('description','like','%'.request('search').'%')
                ->orwhere('tag','like','%'.request('search').'%');
        }
    }

}
