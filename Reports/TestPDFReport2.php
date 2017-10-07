<?
require('fpdf.php');


		   // connect database*****************************************************************
	         //ENTER YOUR DATABASE CONNECTION INFO BELOW:
      $hostname="db696287767.db.1and1.com";
      $database="db696287767";
      $username="dbo696287767";
      $password="only1TP!";

      //DO NOT EDIT BELOW THIS LINE
      $link = mysqli_connect($hostname, $username, $password);
	  $db_selected = mysqli_select_db($link, $database);




$insertQ = "INSERT INTO Application SET ";			
						
						$AcctID = $_POST['AcctID'];		 	 				$insertQ.= "AcctID = '$AcctID', ";
						$Chara = $_POST['Chara'];		 	 				$insertQ.= "Chara = '$Chara', ";
						$Filamentous = $_POST['Filamentous']; 				$insertQ.= "Filamentous = '$Filamentous', ";
						$Planktonic = $_POST['Planktonic'];					$insertQ.= "Planktonic = '$Planktonic', ";
						$Oscillatoria = $_POST['Oscillatoria'];				$insertQ.= "Oscillatoria = '$Oscillatoria', ";
						$XTRGal = $_POST['XTRGal'];		 	 				$insertQ.= "XTRGal = '$XTRGal', ";
						$XTRBP = $_POST['XTRBP'];		 	 				$insertQ.= "XTRBP = '$XTRBP', ";
						$CuPowder = $_POST['CuPowder'];		 				$insertQ.= "CuPowder = '$CuPowder', ";
						$CuGranules = $_POST['CuGranules'];					$insertQ.= "CuGranules = '$CuGranules', ";
						$Komene = $_POST['Komene'];		 	 				$insertQ.= "Komene = '$Komene', ";
						$SeClearGal = $_POST['SeClearGal'];					$insertQ.= "SeClearGal = '$SeClearGal', ";
						$SeClearOz = $_POST['SeClearOz'];		 	 		$insertQ.= "SeClearOz = '$SeClearOz', ";
						$HydrotholOz = $_POST['HydrotholOz'];		 	 	$insertQ.= "HydrotholOz = '$HydrotholOz', ";
						$Coontail = $_POST['Coontail'];		 	 			$insertQ.= "Coontail = '$Coontail', ";
						$Naiad = $_POST['Naiad'];		 	 				$insertQ.= "Naiad = '$Naiad', ";
						$Bladderwarts = $_POST['Bladderwarts'];				$insertQ.= "Bladderwarts = '$Bladderwarts', ";
						$Elodea = $_POST['Elodea'];		 	 				$insertQ.= "Elodea = '$Elodea', ";
						$Hydrilla = $_POST['Hydrilla'];		 	 			$insertQ.= "Hydrilla = '$Hydrilla', ";
						$Watermilfoil = $_POST['Watermilfoil'];		 	 	$insertQ.= "Watermilfoil = '$Watermilfoil', ";
						$Widgeon = $_POST['Widgeon'];	 	 				$insertQ.= "Widgeon = '$Widgeon', ";
						$Other = $_POST['Other'];		 	 				$insertQ.= "Other = '$Other', ";
						$AquatholGal = $_POST['AquatholGal'];				$insertQ.= "AquatholGal = '$AquatholGal', ";
						$AquatholOz = $_POST['AquatholOz'];					$insertQ.= "AquatholOz = '$AquatholOz', ";
						$AquatholGran = $_POST['AquatholGran'];				$insertQ.= "AquatholGran = '$AquatholGran', ";
						$SonarGen = $_POST['SonarGen'];		 				$insertQ.= "SonarGen = '$SonarGen', ";
						$SonarOne = $_POST['SonarOne'];		 	 			$insertQ.= "SonarOne = '$SonarOne', ";
						$Primrose = $_POST['Primrose'];		 				$insertQ.= "Primrose = '$Primrose', ";
						$Watermeal = $_POST['Watermeal'];	 				$insertQ.= "Watermeal = '$Watermeal', ";
						$Duckweed = $_POST['Duckweed'];		 				$insertQ.= "Duckweed = '$Duckweed', ";
						$PlatoonGal = $_POST['PlatoonGal'];	 				$insertQ.= "PlatoonGal = '$PlatoonGal', ";
						$PlatoonBP = $_POST['PlatoonBP'];					$insertQ.= "PlatoonBP = '$PlatoonBP', ";
						$Navigate = $_POST['Navigate'];		 				$insertQ.= "Navigate = '$Navigate', ";
						$TreatAlgae = $_POST['TreatAlgae'];	 				$insertQ.= "TreatAlgae = '$TreatAlgae', ";
						$TreatPondweed = $_POST['TreatPondweed'];			$insertQ.= "TreatPondweed = '$TreatPondweed', ";
						$TreatPrimrose = $_POST['TreatPrimrose'];			$insertQ.= "TreatPrimrose = '$TreatPrimrose', ";
						$AddDye = $_POST['AddDye'];		 	 				$insertQ.= "AddDye = '$AddDye', ";
						$CustNotes = $_POST['CustNotes'];		 			$insertQ.= "CustNotes = '$CustNotes', ";
						$MyNotes = $_POST['MyNotes'];		 	 			$insertQ.= "MyNotes = '$MyNotes' ";
					
					
					//echo $insertQ;
	

      $result_insert = mysqli_query($link,$insertQ);



class PDF extends FPDF
{
    // Page header
    function Header()
    {
    
     	// Logo
    	//Image('path/url', x, y, w, h, type,link )
    			
        $this->Image('images/turnpro-aquatics-pond.png',60,6,80);
        // Logo
        //$this->Image('images/great_blue_heron_9.jpg',150,6,30);
    	
    	$this->SetDrawColor(0,0,255);  // BLUE
    	// Cell(x, h, txt, border(1or0), ln(0-rt, 1-nextLine, 2-below), align(L, C, or R));

    	// Arial bold 15
        $this->SetFont('Arial','B',15);

    	$this->Cell(0,50,'',1,2,'C');

    	
    	$this->SetLineWidth(2);
    	$this->SetDrawColor(150,150,150);
    	
    	$this->Line(10,45,200,45);
        
    	
    	
    	
    	$this->SetLineWidth(.5);
    	$this->SetDrawColor(0,255,0);
    	
    	// Blank space
    	
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(0,10,'Title',1,2,'L');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
	
	
	function Body()
	{
	 		 global $CustNotes;
	 		 // add customer notes to page
			 $this->MultiCell(0,5,$CustNotes,1,'J',false);
	
	
	
	}
	
	
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Body();





// put in php mailer stuff here
require 'PHPMailer5/PHPMailerAutoload.php';


$mail = new PHPMailer(true);
$mail->SMTPDebug = 2;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'turnprojason@gmail.com';                 // SMTP username
$mail->Password = 'Webb2015b';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('turnprojason@gmail.com', 'Jason Webber');
$mail->addAddress('sirwebbie@gmail.com', 'WEbdawg');     // Add a recipient
// $mail->addAddress('sambturnproaquatics@outlook.com', 'Sam Barnes');     // Add a recipient
// $mail->addAddress('turnprojason@gmail.com', 'JasonTurnPro');     // Add a recipient
// $mail->addAddress('Webberhomes@gmail.com');               // Name is optional
$mail->addReplyTo('turnprojason@gmail.com', 'j.Webber');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');



// If I am going to output the doc to the screen, nothing else can be output or echoed out.
$doc = $pdf->Output('S');
$mail->AddStringAttachment($doc, 'doc.pdf', 'base64', 'application/pdf');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body<b>in bold!</b>';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  

$mail->Send();

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
Redirect('http://turnproreports.com/Applicate.php', false);

	
	
?>
