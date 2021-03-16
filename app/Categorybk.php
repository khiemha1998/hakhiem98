<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorybk extends Model
{
    //định nghĩa relationship

    public function parent()
    {
        // belongsto mối quan hệ nghịch đảo một danh mục con  chỉ ở 1 danh mục cha
        return $this->belongsTo("App\Category", "parent_id");
    }

}
