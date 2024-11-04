<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coli
 * 
 * @property string $CodeColis
 * @property string $LibelleColis
 * @property string $DestinationColis
 * @property int|null $PrixColis
 * @property string|null $NomExp
 * @property string $ContactExp
 * @property string|null $NomDest
 * @property string $ContactDest
 * @property int $FraisEnvoi
 * @property string $idCompte
 * 
 * @property Compte $compte
 *
 * @package App\Models
 */
class Coli extends Model
{
	protected $table = 'colis';
	protected $primaryKey = 'CodeColis';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PrixColis' => 'int',
		'FraisEnvoi' => 'int'
	];

	protected $fillable = [
		'LibelleColis',
		'DestinationColis',
		'PrixColis',
		'NomExp',
		'ContactExp',
		'NomDest',
		'ContactDest',
		'FraisEnvoi',
		'idCompte'
	];

	public function compte()
	{
		return $this->belongsTo(Compte::class, 'idCompte');
	}
}
