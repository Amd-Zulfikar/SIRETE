<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'tb_employee';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'contact',
    ];
}
