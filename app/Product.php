<?php

namespace BE;

abstract class Product
{
	public $table;

	public static $connection;

	public $fillable = [];

	public $userid;

	/**
	 * price per unit
	 * @var int
	 */
	public $price;

	/**
	 * total price for product
	 * @var int
	 */
	public $total;

	public $errors = [];


	public function __construct()
	{
		self::$connection = new Database;
	}

	abstract public function validate();

	public static function create($model)
	{
		$sql = 'INSERT INTO ' . $model->table . ' (';
		$sql .= implode(',', $model->fillable) .') ';
		$sql .= 'VALUES (' . implode(',', preg_filter('/^/', ':', $model->fillable)) . ' )';

		echo $sql;
		self::$connection->query($sql);

		foreach ($model->fillable as $key => $value) {
			self::$connection->bind(":$value", $model->{$value});
		}

		self::$connection->execute();
	}


}
