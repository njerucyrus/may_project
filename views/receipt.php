<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 07/06/2017
 * Time: 07:25
 */



require('../public/assets/report/fpdf.php');
$products = ['panadol','piliton','Mara moja'];
$tests = ['Malaria','Typhoid test','Blood Pressure'];
$price=['100','50','50'];
$testPrice=['100','150','50'];
$pdf = new FPDF('P', 'pt', 'Letter','4');
class PDF_receipt extends FPDF {
//    function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
//        $this->FPDF($orientation, $unit, $format);
//        $this->SetTopMargin($margin);
//        $this->SetLeftMargin($margin);
//        $this->SetRightMargin($margin);
//        $this->SetAutoPageBreak(true, $margin);
//    }

    public  function Header() {
        $this->SetFont('Arial', 'B', 20);
        $this->SetFillColor(36, 96, 84);
        $this->SetTextColor(225);
        $this->Cell(0, 10, "SugarBaker Dispensary Clinic", 0, 1, 'C', true);
    }

   public function Footer() {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0,-60);
        $this->Cell(0, 20, "We wish you a quick recovery", 'T', 0, 'C');
    }
    function PriceTable($products, $prices,$tests, $testPrice) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(255, 255, 255);
        $this->SetLineWidth(1);
        $this->Cell(135, 15, "Item Description", 'LTR', 0, 'C', true);
        $this->Cell(50, 15, "Price", 'LTR', 1, 'C', true);

        $this->SetFont('Arial', '');
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;
        $this->Cell(135, 10, "Consultation", 'LTR', 0, 'L', true);
        $this->Cell(50, 10, "100", 'LTR', 1, 'R', true);


        for ($i = 0; $i < count($tests); $i++) {
            $this->Cell(135, 10, $tests[$i], 1, 0, 'L', $fill);
            $this->Cell(50, 10, $testPrice[$i], 1, 1, 'R', $fill);
            $fill = !$fill;
        }



        for ($i = 0; $i < count($products); $i++) {
            $this->Cell(135, 10, $products[$i], 1, 0, 'L', $fill);
            $this->Cell(50, 10, $prices[$i], 1, 1, 'R', $fill);
            $fill = !$fill;
        }
        $this->SetX(100);
        $this->Cell(45, 10, "Total", 1);
        $this->Cell(50, 10, 'KSH' . '200', 1, 1, 'R');
    }



}

//adding a page, and setting the font, we can get down to business.
$pdf = new PDF_receipt();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

//move our cursor
$pdf->Cell(35, 13, "Receipt Number");
$pdf->SetFont('Arial', 'B');
$pdf->Cell(50, 13, '786756674');
$pdf->SetY(30);

//ordered by
//We start by creating a cell that's 100pt wide and 13pt high, with the text of "Ordered By."
//Next, we reset the font to remove the bold. Then we create another cell, and hand it the name we got from our
//form. Of course, in a real project, you'll be checking those values before you use them.

$pdf->Cell(20, 13, "Name");
$pdf->SetFont('Arial', '');
$pdf->Cell(50, 13, 'Samuel Mwihuri Githae');

$pdf->Cell(15, 13, "Phone");
$pdf->SetFont('Arial', 'I');
$pdf->Cell(30, 13, '0701201390');

//adding a date
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 13, 'Date');
$pdf->SetFont('Arial', '');
$pdf->Cell(20, 13, date('F j, Y'), 0, 1);

/*The SetX function does the same thing the SetY function does, except that it sets us out from the right.
 We're putting our position 100pt right of the left margin. Next, we italicize our font and begin outputting
the address. All three lines of the address are 200pt wide and 15pt high. The important thing to notice here
is that our line parameter is 2. This means that after each cell, we will move to the next line and 'tab in'
to line up with the previous cell. Finally, we call the Ln method, which adds a line break. Without a parameter,
it will move our position down the heigh of the last printed cell. We've passed it a parameter, so we're moving
down 100pt.
*/

$pdf->Ln(10);


//Now let's print out a table of the products our customer has purchased.

$pdf->PriceTable($products, $price,$tests, $testPrice);


//jump 50pt
$pdf->Ln(10);

$message = "Thank you for visiting at the sugarbaker Clinic";
$pdf->MultiCell(0, 15, $message);


$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor(1, 162, 232);



$pdf->Output('receipt.pdf', 'F');
$pdf->Output();
?>