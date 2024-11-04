<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Destination
 * 
 * @property string $idDestination
 * @property string $NomDesination
 * @property int $PrixDestination
 * @property int $idGare
 * 
 * @property Gare $gare
 * @property Collection|Depart[] $departs
 *
 * @package App\Models
 */
class Destination extends Model
{
	protected $table = 'destinations';
	protected $primaryKey = 'idDestination';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PrixDestination' => 'int',
		'idGare' => 'int'
	];

	protected $fillable = [
		'NomDesination',
		'PrixDestination',
		'idGare'
	];

	public function gare()
	{
		return $this->belongsTo(Gare::class, 'idGare');
	}

	public function departs()
	{
		return $this->hasMany(Depart::class, 'idDestination');
	}
}
