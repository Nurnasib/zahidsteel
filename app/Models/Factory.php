<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
  public function gallery(){
      return $this->hasMany(FactoryGallery::class);
  }
}
