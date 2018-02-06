<?php

namespace BE;

use Carbon\Carbon;

class Subscription extends Product
{
	public $table = 'subscriptions';

	/**
	 * [public description]
	 * @var [type]
	 */
	public $start;

	/**
	 * [public description]
	 * @var [type]
	 */
	public $end;

	/**
	 * quotation id
	 * @var [type]
	 */
	public $qid;

	/**
	 * exclude saturday(6) and sunday(0) from the total
	 * @var array
	 */
	private $excludes = [0,6];

	public $fillable = [
		'userid', 'start', 'end', 'total', 'qid'
	];

	public function validate()
	{
		$this->total = $this->total();

		return (!is_null($this->start) && !is_null($this->end) && $this->total > 0);
	}

	public function total()
	{
		$from = Carbon::parse($this->start);
		$to = Carbon::parse($this->end);
		$days = $to->diffInWeekdays($from)?:1;

		return $days * $this->price;
	}

	public function save()
	{
		if($this->validate()) {
			$this->start = Carbon::parse($this->start)->toDateString();
			$this->end = Carbon::parse($this->end)->toDateString();
			
			return parent::create($this);
		}


	}
}
