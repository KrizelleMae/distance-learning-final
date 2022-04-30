<?php

    require('../FPDF/fpdf.php');

    $db = new PDO("mysql:host=localhost;dbname=distance_learning","root","");

  

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $program = $_POST['program'];       
        
        // GFG logo image
        $this->Image('../images/dl-logo.png', 80, 8, 20);
          
        // GFG logo image
        $this->Image('../images/dl-logo.png', 210, 8, 20);
          
           
        // Set font-family and font-size
        $this->SetFont('Arial','B', 11);

        // Move to the right
        $this->Cell(130);
          
          
        // Move to the right
        $this->Cell(30, 5, 'DISTANCE LEARNING EDUCATION', 0, 0, 'C');
          
       
        // Break line with given space
        $this->Ln(4 );

        
        // Move to the right
        $this->Cell(130);
          
            
        // Set font-family and font-size
        $this->SetFont('Arial','', 10);
          
        // Move to the right
        $this->Cell(30,10, 'Western Mindanao State University', 0, 0, 'C');

        // Break line with given space
        $this->Ln(6);
         
        // Move to the right
        $this->Cell(130);


        // Set font-family and font-size
        $this->SetFont('Arial','I', 8);
          
        // Move to the right
        $this->Cell(30,10, 'Normal Road, Baliwasan 7000 Zamboanga City Philippines', 0, 0, 'C');

        // Break line with given space
        $this->Ln(30);
         
        // Move to the right
        // $this->Cell(5);

        
        // // Set font-family and font-size
        // $this->SetFont('Arial','', 10);
          

        //  // Move to the right
        // $this->Cell(30, 10, 'These are the following list for' .$program, 0, 0, 'C');
        // $this->Ln(10);

    }
       
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Set font-family and font-size of footer.
        $this->SetFont('Arial', '', 8);
          
        // set page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() .
              '/{nb}', 0, 0, 'C');
    }

    function headerTable(){
        $this->setFont('Arial', 'B', 8);
        $this->Cell(30, 9, 'ID', 1, 0, 'C');
        $this->Cell(67, 9, 'STUDENT NAME', 1, 0, 'C');
        $this->Cell(55, 9, 'EMAIL', 1, 0, 'C');
        $this->Cell(35, 9, 'CONTACT #', 1, 0, 'C');
        $this->Cell(30, 9, 'COLLEGE', 1, 0, 'C');
        $this->Cell(60, 9, 'MAJOR', 1, 0, 'C');
        $this->Ln();

    }

    function viewTable($db){
        
        $db = new PDO("mysql:host=localhost;dbname=distance_learning","root","");

        $program = $_POST['program'];

        if($program == "All"){
            $sql = "select * from user_details INNER JOIN application ON user_details.user_id = application.user_id";
            $stmt = $db->query($sql);
        } else {
            $sql = "select * from user_details INNER JOIN application ON user_details.user_id = application.user_id  WHERE user_details.program = '$program';";
             $stmt = $db->query($sql);
        }


        $this->setFont('Arial', '', 8);
        $sql = "select * from user_details";
        $stmt = $db->query($sql);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(30, 10, $data->user_id, 1, 0, 'C');
            $this->Cell(67, 10, $data->first_name.' '. $data->last_name, 1, 0, 'C');
            $this->Cell(55, 10, $data->email, 1, 0, 'C');
            $this->Cell(35, 10, $data->mobile, 1, 0, 'C');
            $this->Cell(60, 10, $data->program, 1, 0, 'C');
            $this->Ln();
        }
    }
}
   
// Create new object.
$pdf = new PDF();
$pdf->AliasNbPages();
  
// Add new pages
$pdf->AddPage('L', 'A4', 0);

$pdf->headerTable();
$pdf->viewTable($db);
  
$pdf->Output();
  
?>