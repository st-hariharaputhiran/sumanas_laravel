<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Image extends Model
{
    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
?>