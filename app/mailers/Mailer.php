<?php namespace Mailers;

use Mail;

class Mailer 
{
	public function sendTo($email, $subject, $view, $data = array(), $attachments = '')
	{
		Mail::queue($view, $data, function($message) use ($email, $subject, $attachments)
		{
			$message->to($email)->subject($subject);
			if($attachments)
			{
				if( is_string($attachments) || (strlen($attachments) > 0) )
				{
					$message->attach($attachments);
				}
				else if( is_array($attachments) )
				{
					foreach($attachments as $i => $file)
					{
						$message->attach($file);
					}
				}
			}
		});
		/**
		 * Log the email
		 **/
	}

	public function replace($body, $replacements)
	{
		$result = $body;
		foreach($replacements as $jolly => $value)
		{
			$result = str_replace('%' . $jolly . '%', $value, $result);
		}
		return $result;
	}
}