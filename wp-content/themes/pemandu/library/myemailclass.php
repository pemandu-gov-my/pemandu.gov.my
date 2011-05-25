<?php
	include("libmail.php");
	function sendemail($to, $cc, $from, $sub, $msg, $filename, $filepath)
	{
		// for test //
		//saveto_emaillog($to, $cc, $from, $sub, $msg, $filename, $filepath);
		
		// for live //
		$mContact = new Mail;
		$mContact->From($from);
		
		//if(isset($cc) && !empty($cc)) { $mContact->Cc($cc); }
		$to_arr	=	explode(",",$to);
		for($i=0; $i<count($to_arr); $i++)
		{
			$mContact->To(trim(strtolower($to_arr[$i])));
			if(isset($filename) && !empty($filename) && isset($filepath) && !empty($filepath)) { $mContact->Attach($filename,$filepath,'attachment'); }
			$mContact->Subject($sub);
			$mContact->Body(stripslashes($msg));
			$mContact->Priority(1); 
			$mContact->BuildMail();
			$mContact->Send();
		}
		
		return 1;
	}
	
/*	function saveto_emaillog($to, $cc, $from, $sub, $msg, $filename, $filepath)
	{
		global $db;
		
		$db->query("CREATE TABLE IF NOT EXISTS `temp_emaillog` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `to_email` varchar(100) NOT NULL,
		  `cc` varchar(100) NOT NULL,
		  `from_email` varchar(100) NOT NULL,
		  `subject` varchar(255) NOT NULL,
		  `message` text NOT NULL,
		  `filename` varchar(100) NOT NULL,
		  `filepath` varchar(255) NOT NULL,
		  `senddate` datetime NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;");
		
		$db->query("insert into temp_emaillog(to_email, cc, from_email, subject, message, filename, filepath, senddate) values('$to', '$cc', '$from', '$sub', '$msg', '$filename', '$filepath', now())");
	}*/
?>