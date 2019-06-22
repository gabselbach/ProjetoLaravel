<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagens extends Model
{
      protected $fillable = [
        'imagem','user_id',

    ];
    protected $guarded=[
    'id',
    'created_at',
    'updated_at'
  ];

}
