<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @property mixed $user_id
 */
class Listing extends Model
{
    use HasFactory;

    public mixed $logo;
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
    //Relationship To User
        public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
        return $this->belongsTo(User::class,'user_id');

    }

}
