<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $table = 'form_fields';

    protected $fillable = array(
        'id','form_id','field_id','label','values'
    );

    public function fieldName()
    {
        return $this->belongsTo('App\HtmlField','field_id');
    }


}
