<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property string $idTicket
 * @property int|null $NumDepart
 * @property string|null $DestinationVoyage
 * @property int|null $PrixTicket
 * @property Carbon|null $DateDepart
 * @property Carbon|null $HeureDepart
 * @property string $idCompte
 * 
 * @property Compte $compte
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';
	protected $primaryKey = 'idTicket';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'NumDepart' => 'int',
		'PrixTicket' => 'int',
		'DateDepart' => 'datetime',
		'HeureDepart' => 'datetime'
	];

	protected $fillable = [
		'NumDepart',
		'DestinationVoyage',
		'PrixTicket',
		'DateDepart',
		'HeureDepart',
		'idCompte'
	];

	public function compte()
	{
		return $this->belongsTo(Compte::class, 'idCompte');
	}
}
