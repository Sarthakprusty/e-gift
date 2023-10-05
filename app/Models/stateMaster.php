<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stateMaster extends Model
{
    use HasFactory;


    protected $table="state_masters";
    protected $primaryKey = "id";

    protected $fillable = [
        'state_name',
        'status',
    ];

}
