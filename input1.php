<?php


	$name=trim($_POST['name']);
	$categ =  trim($_POST['categ']);
	$brand = trim($_POST['brand']);
	$disc = trim($_POST['disc']);




$collection = $client->shop->product;
$result = $collection->insertOne( [ 'name' => $name, 'categ' => $categ,'brand' => $brand, 'disc' => $disc ] );