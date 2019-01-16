<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Invoice;
use App\Ticket;
use App\Task;
use App\StaffSettings;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // add a relationship to invoices
    public function invoices()
    {
      return $this->hasMany(Invoice::class)->latest();
    }

    // add a relationship to tickets
    public function tickets()
    {
      return $this->hasMany(Ticket::class)->latest();
    }

    // add a relationship to tasks
    public function tasks()
    {
      return $this->hasMany(Task::class)->latest();
    }

    public function staffSettings()
    {
      return $this->hasOne(StaffSettings::class);
    }
}
