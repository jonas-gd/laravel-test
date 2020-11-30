<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NumberPreferences extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['number_id','name','value'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'number_preferences';

}
