<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    // 必ず埋める部分
    protected $fillable = [
        'name',
        'gender',
        'age',
        'address',
        'tel'
    ];
}
