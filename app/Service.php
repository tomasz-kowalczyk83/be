<?php

namespace BE;

use Carbon\Carbon;

class Service extends Product
{
	public $table = 'services';

	public $start = '';

	public $end = '';

	public $day = '';

	public $weeks = 1;

	public $hours;

	private $from;

	private $to;

	protected $excludes = [0];

	public $fillable = [
		'userid', 'start', 'end', 'weeks', 'total', 'qid'
	];

	public function validate()
	{

		$this->from = Carbon::parse($this->start);
		$this->to = Carbon::parse($this->end);
		$days = $this->from->diffInDays($this->to);
		$this->weeks = $this->to->diffInWeeks($this->from) ?:1;
		$this->hours = $this->to->subDays($days)->diffInHours($this->from);

		if(in_array($this->from->dayOfWeek, $this->excludes)) {
			$this->errors[] = "This service cannot be booked for a {$this->from->format('l')}";

			return false;
		}

		if($this->hours <= 0) {
			$this->errors[] = "This service must be booked for at least 1h";

			return false;
		}

		return true;
	}

	public function total()
	{
		return ($this->price * $this->hours) * $this->weeks;
	}

	public function save()
	{
		if($this->validate()) {
			$this->start = Carbon::parse($this->start)->toDateTimeString();
			$this->end = Carbon::parse($this->end)->toDateTimeString();

			$this->total = $this->total();

			return parent::create($this);
		}
	}
}
