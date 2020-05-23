<?php
if(isset($_POST["pdf"])){
include('dist/koneksi.php');
require('plugins/fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y' );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('img/Harfa.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(23.5,0.7,'LAZ HARFA BANTEN',0,'C');
$pdf->SetX(4);
$pdf->MultiCell(23.5,0.7,'Lembaga Amil Zakat Harapan Duafah, Banten.',0,'C');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(23.5,0.5,'Jl. Ciwaru 1 Komplek Pondok Citra,No. 1b, Kelurahan Cipare, Kecamatan Serang, Kota Serang, Banten',0,'C');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(31,0.7,"Laporan Rapat Harian",0,10,'C');
$pdf->ln(1);
//$pdf->SetFont('Arial','B',10);
//$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Visi/Misi', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Pembacaan Attubah', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Share medsos', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Input Muthabaah', 1, 0, 'C');
$pdf->Cell(9, 0.8, 'Hasil Rapat', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$no=1;

$tanggal_awal=$_POST['dari'];
$tanggal_akhir=$_POST['sampai'];
$sql = mysql_query("SELECT td.*, b.nama
FROM drm as td, tb_pegawai as b WHERE b.nip=td.nip AND ( Tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir')") or die(mysql_error());
while($d = mysql_fetch_array($sql)){

    $pdf->SetFillColor(224,235,255);
    $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
    $pdf->Cell(3.5, 0.8, $d['nama'], 1, 0,'C',true);
    $pdf->Cell(2.5, 0.8, $d['Tanggal'],1, 0, 'C');
    $pdf->Cell(2.5, 0.8, $d['Pembacaan_visi_misi'], 1, 0,'C',true);
    $pdf->Cell(3.5, 0.8, $d['Pembacaan_attaubah'],1, 0, 'C');
    $pdf->Cell(2.5, 0.8, $d['Share_medsos'],1, 0, 'C',true);
    $pdf->Cell(3.5, 0.8, $d['Input_muthabaah'],1, 0, 'C');
	$pdf->Cell(9, 0.8, $d['Pembahansan_drm'], 1, 1,'C',true);

	$no++;
}
$tampiluser=mysql_query("SELECT * FROM 	tb_user");
while($peg=mysql_fetch_array($tampiluser)){

	$id_user=($peg['id_user']);
	$nama_user=($peg['nama_user']);
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(50,0.7, "Serang, $currentTime",0,10,'C');
$pdf->Cell(50,0.7,"KADEP SDM",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,0.7,"$nama_user",0,10,'C');

$pdf->Output("laporan_buku.pdf","I");
}
?>