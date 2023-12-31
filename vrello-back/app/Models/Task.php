<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperTask
 */
class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'content',
        'done',
        'user_id'
    ];

    protected $casts = [
        'done' => 'boolean',
    ];

}
