<?php

namespace BE;

class Quotation extends Product
{
	public $table = 'quotations';

	public $complete = false;

	public $uid;

	public $total = 0;

	public $products = [];

	public $fillable = [
		'uid', 'total', 'userid'
	];

	public function __construct()
	{
		parent::__construct();

		$this->uid = uniqid();
	}

	public function validate()
	{
		return true;
	}

	public function add(Product $product)
	{
		$product->qid = $this->uid;

		$this->products[] = $product;
	}

	public function save()
	{
		foreach ($this->products as $product) {
			$product->save();
			$this->total += $product->total;
		}

		return parent::create($this);
	}

	public static function get($id)
	{
		// get quotation from database
		self::$connection->query("SELECT * FROM quotations WHERE uid = :uid");
		self::$connection->bind(':uid', $id);

		$quotation = self::$connection->single();

		//add subscriptions for current quotation from database
		self::$connection->query("SELECT * FROM subscriptions WHERE qid = :qid");
		self::$connection->bind(':qid', $id);

		$quotation['subscriptions'] = self::$connection->resultset();

		//add services for current quotation from database
		self::$connection->query("SELECT * FROM services WHERE qid = :qid");
		self::$connection->bind(':qid', $id);

		$quotation['services'] = self::$connection->resultset();

		//add goods for current quotation from database
		self::$connection->query("SELECT * FROM goods WHERE qid = :qid");
		self::$connection->bind(':qid', $id);

		$quotation['goods'] = self::$connection->resultset();

		return $quotation;
	}
}
