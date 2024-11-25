<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name_l',
        'Model_l',
        'Cpu_l',
        'Color_l',
        'Ram_l',
        'Url_Image',
        'Existence_l'
    ];
}
