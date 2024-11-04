<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gare
 * 
 * @property int $idGare
 * @property string|null $NomGare
 * @property string|null $AdresseGare
 * @property string|null $ContactGare
 * 
 * @property Collection|Compte[] $comptes
 * @property Collection|Destination[] $destinations
 *
 * @package App\Models
 */
class Gare extends Model
{
	protected $table = 'gares';
	protected $primaryKey = 'idGare';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idGare' => 'int'
	];

	protected $fillable = [
		'NomGare',
		'AdresseGare',
		'ContactGare'
	];

	public function comptes()
	{
		return $this->hasMany(Compte::class, 'idGare');
	}

	public function destinations()
	{
		return $this->hasMany(Destination::class, 'idGare');
	}
}
