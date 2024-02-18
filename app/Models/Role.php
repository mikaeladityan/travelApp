<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'status'];

    // Have many to many with privilage
    public function privileges(): BelongsToMany
    {
        return $this->belongsToMany(Privilage::class, 'roles_privilages');
    }
}
