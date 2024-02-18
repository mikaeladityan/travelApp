<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Privilage extends Model
{
    use HasFactory;
    protected $fillable = ['privilage', 'status'];

    // Have many to many with role
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_privilages');
    }
}
