<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    public function delete()
    {
        @unlink(storage_path('uploads/features/') .$this->image);
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
