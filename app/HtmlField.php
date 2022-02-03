<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HtmlField extends Model
{
    protected $table = 'html_fields';

    protected $fillable = array(
        'id','field'
    );
}
