<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        "role",
        "permission_use_dashboard",
        "permission_access_posts",
        "permission_access_categories",
        "permission_access_roles",
        "permission_access_users",
        "permission_access_images",
    ];
}
