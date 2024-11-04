<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compte
 * 
 * @property string $idCompte
 * @property string|null $Nom
 * @property string|null $Email
 * @property string|null $Contact
 * @property string|null $MotDePasse
 * @property int $idGare
 * 
 * @property Gare $gare
 * @property Collection|Bagage[] $bagages
 * @property Collection|Coli[] $colis
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Compte extends Model
{
	protected $table = 'comptes';
	protected $primaryKey = 'idCompte';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idGare' => 'int'
	];

	protected $fillable = [
		'Nom',
		'Email',
		'Contact',
		'MotDePasse',
		'idGare'
	];

	public function gare()
	{
		return $this->belongsTo(Gare::class, 'idGare');
	}

	public function bagages()
	{
		return $this->hasMany(Bagage::class, 'idCompte');
	}

	public function colis()
	{
		return $this->hasMany(Coli::class, 'idCompte');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'idCompte');
	}
}
