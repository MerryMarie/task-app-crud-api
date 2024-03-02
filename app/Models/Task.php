<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Task extends Model
{
    use Filterable;

    protected $fillable = [
        'body',
        'status_id',
        'deadline_at',
    ];
    
}
