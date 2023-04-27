<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["category_id", 'name', 'description', 'technology_used', 'start_date', 'published'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }


    public function getDescription($max = 20){
        return substr($this->description, 0, $max) . "...";
    }

    public function getUpdatedAtAttribute($value){
        return date("d/m/Y H:i:s", strtotime($value));
    }

    public function getCreatedAtAttribute($value){
        return date("d/m/Y H:i:s", strtotime($value));
    }
}