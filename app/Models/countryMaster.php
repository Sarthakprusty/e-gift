<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countryMaster extends Model
{
    use HasFactory;

    protected $table="country_masters";
    protected $primaryKey = "id";

    protected $fillable = [
        'country_name',
        'status',
    ];
}
