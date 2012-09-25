<?php

index();

function index() {
	
	$amount_to_withdraw = array(
		'10'=>1500,
		'12'=>1500,
		'1000'=>1500,
		'1480'=>1500,
		'1499'=>1500,
		'1499.50'=>1500,
		'1499.75'=>1500,
		'1500'=>1500
	);

	foreach ($amount_to_withdraw as $key => $value) {
		$transaction = calculate($key,$value);
	}
}

function calculate($x,$balance) {
	$amount_to_withdraw = $x;
	echo '<pre/>';
	echo 'Amount To Withdraw: '.$amount_to_withdraw;
	echo '<pre/>';
	echo 'Available Balance:'.$balance;
	if($x % 5 != 0) {
		echo '<pre/>';
		echo 'Incorrect Withdrawal Amount (not multiple of 5)';
		echo '<br>--------------------------------------------------------';
		return;
	}
	if($x >= $balance || ($x+0.50 > $balance)) {
		echo '<pre/>';
		echo 'Insufficient Funds';
		echo '<br>--------------------------------------------------------';
		return;
	}
	if($x <=0 || $x > 2000) {
		echo '<pre/>';
		echo 'Amount To Withdraw should be between 0 and 2000';
		echo '<br>--------------------------------------------------------';
		return;
	}
	if($balance < 0 || $balance > 2000) {
		echo '<pre/>';
		echo 'Available balance is between 0 and 2000';
		echo '<br>--------------------------------------------------------';
		return;
	}
	$amount_withdrawn = $x + 0.50;
	$balance_remaining = $balance - $amount_withdrawn;
	echo '<pre/>';
	echo 'Amount Withdrawn: '.$x;
	echo '<pre/>';
	echo 'Bank Charges: 0.50';
	echo '<pre/>';
	echo 'Remaining Balance: '.$balance_remaining;
	echo '<br>--------------------------------------------------------';
	return;
}

?>