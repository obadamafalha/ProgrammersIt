<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Review extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded();
    }
}
