<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bagage
 * 
 * @property string $CodeBagage
 * @property string $LibelleBagage
 * @property string $ContactClient
 * @property string $DestinationBagage
 * @property int|null $PrixBagage
 * @property string $idCompte
 * 
 * @property Compte $compte
 *
 * @package App\Models
 */
class Bagage extends Model
{
	protected $table = 'bagages';
	protected $primaryKey = 'CodeBagage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'PrixBagage' => 'int'
	];

	protected $fillable = [
		'LibelleBagage',
		'ContactClient',
		'DestinationBagage',
		'PrixBagage',
		'idCompte'
	];

	public function compte()
	{
		return $this->belongsTo(Compte::class, 'idCompte');
	}
}
