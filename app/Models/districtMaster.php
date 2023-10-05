<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class districtMaster extends Model
{
    use HasFactory;

    protected $table="district_masters";
    protected $primaryKey = "id";

    protected $fillable = [
        'district_name',
        'status',
    ];

}
