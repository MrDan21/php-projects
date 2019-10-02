<?php

namespace App;

class HtmlLogger implements Logger
{
	public function info($message)
	{
	    echo "<p>$message</p>";
	}
}