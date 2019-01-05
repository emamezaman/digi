<?php

return [

	/* Important Settings */

	// ======================================================================
	// never remove 'web', just put your middleware like auth or admin (if you have) here. eg: ['web','auth']
	'middlewares' => ['web'],
	// you can change default route from sms-admin to anything you want
	'route' => 'sms-admin',
	// SMS.ir Api Key
	'api-key' => env('SMSIR-API-KEY','cdc821efa03c6a7f36e21ef'),
	// SMS.ir Secret Key
	'secret-key' => env('SMSIR-SECRET-KEY','"#f123!!%&#*jk"
'),
	// Your sms.ir line number
	'line-number' => env('SMSIR-LINE-NUMBER','30004747475316'),
	// ======================================================================
	// set true if you want log to the database
	'db-log' => true,
	// if you don't want to include admin panel routes set this to false
	'panel-routes' => true,
	/* Admin Panel Title */
	'title' => 'مدیریت پیامک ها',
	// How many log you want to show in sms-admin panel ?
	'in-page' => '15'     
];