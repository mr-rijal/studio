<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySchema extends Model
{
    protected $fillable = [
        'name',
        'schema_name',
    ];
}
