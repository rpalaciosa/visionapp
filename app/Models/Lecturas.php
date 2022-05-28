<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturas extends Model
{
    use HasFactory;
    protected $table = 'lecturas';
    protected $fillable = ['device_tk','variable_tk','label','name','value'];
}
