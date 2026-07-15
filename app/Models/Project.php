<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
   public function gallery()
   {
       return $this->hasMany(ProjectGallery::class);
   }
}
