<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    use HasFactory;
    public $directory="./images/";  
    protected $table='uploads';  
    public function getPathAttribute($value)  
    {  
    return $this->directory.$value;  
    }  
}
