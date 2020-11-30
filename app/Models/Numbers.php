<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Numbers extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['customer_id','number','status'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'numbers';

}
