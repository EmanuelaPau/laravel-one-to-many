<?php

namespace App\Models\Admin;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'slug',
        'title_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}