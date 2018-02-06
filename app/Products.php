<?php

namespace BE;

class Products
{
	private static $connection;

	public function __construct()
	{
		self::$connection = new Database;
	}

	public static function all()
	{
		self::$connection->query("SELECT * FROM products");

		return self::$connection->resultset();
	}
}
