<?php
require __DIR__ . '/../vendor/autoload.php';

$quotation = new BE\Quotation;

if(!empty($_POST['subscription_daterange'])) {
	list($from, $to) = explode('-', $_POST['subscription_daterange']);
	$subscription = new BE\Subscription;
	$subscription->start = $from;
	$subscription->end = $to;
	$subscription->price = 10;

	$quotation->add($subscription);

}

if(!empty($_POST['service_daterange'])) {

	list($from, $to) = explode('-', $_POST['service_daterange']);
	$service = new BE\Service;
	$service->start = $from;
	$service->end = $to;
	$service->price = 15;

	$quotation->add($service);
}

$quotation->save();

header("Location: confirm.php?qid=$quotation->uid");
die();
