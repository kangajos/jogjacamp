<?php

namespace App\Models;

use App\Jobs\SendMailCRUDCategoryJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {

        static::created(function ($model) {
            $data = [
                'event' => 'created',
                'category' => $model,
                'user' => User::first()
            ];
            dispatch(new SendMailCRUDCategoryJob($data));
        });
    }
}
