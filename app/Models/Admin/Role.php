<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $table = 'tb_roles';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'keterangan',
    ];
}
