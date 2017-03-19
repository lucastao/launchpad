<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class InterviewSlot extends Model
{
	protected $table = 'interview_slot';
	protected $fillable = ['*'];
	public $timestamps = false;
	protected $appends = ['formattedStartTime', 'formattedEndTime'];
	
	public function getFormattedStartTimeAttribute() {
		$c = new \Carbon\Carbon($this->start_time);
		return $c->format('F j, g:i A');
	}
	public function getFormattedEndTimeAttribute() {
		$c = new \Carbon\Carbon($this->end_time);
		return $c->format('g:i A');
	}

	public function assignments() {
        return $this->hasMany('App\Models\InterviewAssignment');
	}
}