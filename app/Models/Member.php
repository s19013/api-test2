<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    // 使うテーブルを教える
    protected $table = 'members';
    // 主キーを教える
    protected $primaryKey = 'id';

    //idの数字を自動で増やす
    public $incrementing = true;

    // タイムスタンプを使うことを教える
    public $timestamps = true;

    // 必ず埋める部分
    protected $fillable = [
        'name',
        'gender',
        'age',
        'address',
        'tel'
    ];
}
