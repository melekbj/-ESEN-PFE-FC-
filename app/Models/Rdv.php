<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    
    public $timestemps=false;

    protected $fillable = [
  
        'idPatient',
        'idMedecin',
        'dateRdv',
        'heureRdv',
        'etat',
        'motif'
    
    ];
    
    public function patient()
    {
        return $this->belongsTo(User::class, 'idPatient', 'id');
    }
    public function medecin()
    {
        return $this->belongsTo(User::class, 'idMedecin', 'id');
    }
    public function specialite()
    {
        return $this->belongsTo( Specialite::class, 'idMedecin', 'idSpec');
    }
    
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'idMedecin', 'idVille');
    }

    
}
