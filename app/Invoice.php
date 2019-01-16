<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Invoice extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function invoiced_to()
    {
      return $this->belongsTo(User::class, 'invoiced_user_id');
    }
}
