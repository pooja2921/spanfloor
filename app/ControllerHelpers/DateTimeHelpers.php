<?php

namespace App\ControllerHelpers;
use Carbon\Carbon;

class DateTimeHelpers

{
	//carbon default
	public static function DateFormat($date)
	{
		return Carbon::parse($date);
	}

}