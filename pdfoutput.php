<?php
    
        require("fpdf.php");
        include("./api/connection.php");

        $conn = conexion();

        if ($_GET["type"] == "user") {
            $sql = "SELECT id,email,username FROM usuarios";
            $header = array("id","email","usuario");
            $width = 65;
        }
        else {
            $sql = "SELECT Name,Id,quantity,price FROM productos";
            $header = array("Nombre","Id","Stock","Precio");
            $width = 50;
        }
        $result = $conn -> query($sql);

        $tableData = array();
        while ($row = $result->fetch_assoc()) {
            $tableData[] = $row;
        }
        // Simple table
        class PDF extends FPDF
        {
        function BasicTable($header, $data,$width)
        {
            // Header
            foreach($header as $col)
                $this->Cell($width,7,$col,1);
            $this->Ln();
            // Data
            foreach($data as $row)
            {
                foreach($row as $col)
                    $this->Cell($width,6,$col,1);
                $this->Ln();
            }
        }
    }
        $pdf = new PDF();
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
        $pdf->BasicTable($header,$tableData,$width);
        $pdf->Output();

?>