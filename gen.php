<?php

require_once('tcpdf/tcpdf.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $orderid = isset($_POST['orderid']) ? $_POST['orderid'] : '';
    $jobid = isset($_POST['product']) ? $_POST['product'] : '';
    $description = isset($_POST['price']) ? $_POST['price'] : '';
    $currdate = date('d-m-Y H:i:s');

    require_once('tcpdf/tcpdf.php');

    $pdf = new TCPDF();

    $pdf->AddPage();

    $pdf->SetFont('times', 'I', 12);

    $pdf->Cell(0, 10, 'Order ID: ' . $orderid, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Product: ' . $jobid, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Price: ' . $description, 0, 1, 'L');
    $pdf->Cell(0, 10, 'Date: ' . $currdate, 0, 1, 'L');

    $pdf->Output('businessname_invoice_'.$orderid.'.pdf', 'D'); /// change this to the order id or something else
} else {
    header("Location: main.html");
    exit();
}
?>
