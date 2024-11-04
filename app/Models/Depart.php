<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Depart
 * 
 * @property string $idDepart
 * @property Carbon|null $HeureDepart
 * @property string $idDestination
 * 
 * @property Destination $destination
 *
 * @package App\Models
 */
class Depart extends Model
{
	protected $table = 'depart';
	protected $primaryKey = 'idDepart';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'HeureDepart' => 'datetime'
	];

	protected $fillable = [
		'HeureDepart',
		'idDestination'
	];

	public function destination()
	{
		return $this->belongsTo(Destination::class, 'idDestination');
	}
}
