<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_name',
        'path',
        'imageable_type',
        'imageable_id'
    ];
    public function imageable()
    {
        return $this->morphTo();
    }

}
