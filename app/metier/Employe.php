<?php
namespace App\Metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Employe extends Model
{
    protected $table = 'employe';
    public $timestamps = false;
    protected $fillable = [
        'civilite',
        'prenom',
        'nom',
        'pwd',
        'profil',
        'interet',
        'message'
    ];
}

?>
