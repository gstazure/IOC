
<?php

require('libs/fpdf/fpdf.php');
	$pdf = new FPDF();

	$pdf->AddPage();


	$pdf->SetFont('Arial', 'B', 18);

	if (!$modelStocks) {
	    echo'<h3 class="text-center success"><strong>Bump , no records found !</strong></h3>';
	    return 0;
	}
	else{
		$pdf->Image('views/img/ioc.png', 95, 1, 20);
		$pdf->MultiCell(20, 20, "");
		$pdf->Text(75, 28, "Lubricant transport report \n");
		$pdf->Text(65, 28, "");
		//table data
		$pdf->SetFont('Arial', 'B', 8);

		date_default_timezone_set('Asia/Colombo'); //to get srilankan time instead of GMT time
		$date = date("l jS \of F Y h:i:s A");

		$pdf->Text(5, 5, ' Date: ' . $date);

		$heading = array("Record Id", "Date", "Driver","Brnach","Product","VehicleNo");
		$pdf->Cell(20, 20, '', 0, 0, 'C');
		foreach ($heading as $column_heading) {
		    $pdf->Cell(25, 15, $column_heading, 1, 0, 'C');
		}

		$pdf->SetMargins(30, 0);
		foreach ($modelStocks as $row) {
		    $pdf->SetFont('Arial', '', 8);
		    $pdf->Ln();
		    foreach ($row as $column)
		        $pdf->Cell(25, 10, $column, 1, 0, 'C');
		}

		$pdf->Output();		
	}

?>

