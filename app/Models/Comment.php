<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Comment extends Model
{
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}