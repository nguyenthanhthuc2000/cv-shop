<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 8;

    public function categoryParent(){
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }
}
