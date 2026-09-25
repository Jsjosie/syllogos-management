<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'birth_date',
        'address',
        'status',
        'notes',
    ];

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }
}
