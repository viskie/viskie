
<?

require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");

Class SMTPMailer {
	
	private $mailer;
	
	function __construct() {
		$this->mailer = new PHPMailer();
		$this->mailer->IsSMTP();
		$this->mailer = "smtp";
		
		$thjis->configure();
	}
	
	private function configure() {
		
		//TODO: Mod this to allow loading config from config file
		
		$this->mailer->SMTPDebug  = 1;  
		$this->mailer->SMTPAuth   = TRUE;
		$this->mailer->SMTPSecure = "tls";
		$this->mailer->Port       = 587;
		$this->mailer->Host       = "smtp.gmail.com";
		$this->mailer->Username   = "athe9ite@gmail.com";
		$this->mailer->Password   = "gBsW5ZDh5cnzEr2";		
	}
	
	private function defineHeaders($recepient, $subject) {
		$this->mailer->IsHTML(false);
		$this->mailer->AddAddress($recepient, "VVN");
		$this->mailer->SetFrom("athe9ite@gmail.com", "My SMS Service");
		
		//TODO: Link this with a incoming mail parser for bi-directional comm
		$this->mailer->AddReplyTo("athe9ite@gmail.com", "reply-to-name");
		//$this->mailer->AddCC("cc-recipient-email@domain", "cc-recipient-name");
		$this->mailer->Subject = $subject;
		
	}
	
	public function sendMail($recepient, $subject, $content) {
		$this->defineHeaders($recepient, $subject);
		$this->mailer->Body = $content;
		if(!$this->mailer->send()) {
			echo 'Message was not sent.';
			echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent.';
		}
	}
	
	
	
	
	
	
	
	
}




?>
