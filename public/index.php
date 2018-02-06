<?php
	require __DIR__ . '/../vendor/autoload.php';
	$subscription = new BE\Subscription;
	$service = new BE\Service;

	var_dump($subscription->total(), $service->total());
	var_dump(uniqid());
?>
