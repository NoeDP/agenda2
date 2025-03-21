<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Evento extends Model
{
    use HasFactory, SoftDeletes,Searchable;

    protected $table = 'eventos'; // Nombre de la tabla en la BD

    protected $guarded = [
        
        
        ];
    protected $dates = ['deleted_at'];
        
    
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id')->withTrashed();
    }

    public function organizador()
    {
        return $this->belongsTo(Organizador::class, 'organizadors_id')->withTrashed();
    }

    public function foro()
    {
        return $this->belongsTo(Foro::class, 'foros_id')->withTrashed();
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }
}


