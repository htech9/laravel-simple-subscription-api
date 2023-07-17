<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Events\PostSaved;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['website', 'title', 'content', 'authors'];

    public static function boot() {
        parent::boot();

        /** 
         * Write code on Method
         *
         * @return response()
         */
        static::created(function($item) {
            Log::info('Creating event call: '.$item);        
            event(new PostSaved($item));
        });
    }
}
