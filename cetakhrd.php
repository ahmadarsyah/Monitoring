<?php
session_start();
if(!isset($_SESSION['id_user'])){
    die("<b>Oops!</b> Access Failed.
		<p>Sistem Logout. Anda harus melakukan Login kembali.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
if($_SESSION['hak_akses']!="HRD"){
    die("<b>Oops!</b> Access Failed.
		<p>Anda Bukan HRD.</p>
		<button type='button' onclick=location.href='index.php'>Back</button>");
}
include 'plugins/fpdf/fpdf.php';
require_once('dist/koneksi.php');
//mengambil data dari tabel
$no_cuti = $_GET['no_cuti'];
//$query = "SELECT b.no_cuti AS 'kdct', a.nip AS 'nmpegawai', a.jab AS 'jabatan', a.Divisi AS 'divisi',
//b.dari AS 'mulai', b.sampai AS 'selesai', b.jenis AS 'alasan', b.persetujuan AS 'ket'
//FROM  tb_mohoncuti AS b, tb_pegawai AS a WHERE a.nip=b.nip AND c.no_cuti='$no_cuti'";
$tampilcuti=mysql_query("SELECT * FROM 	tb_mohoncuti");
while($user=mysql_fetch_array($tampilcuti)){

$no_cuti=($user['no_cuti']);
$tgl=date("d F Y",strtotime($user['tgl']));
$jumlah_hari=($user['jml_hari']);
$dari=date("d F Y",strtotime($user['dari']));
$sampai=date("d F Y",strtotime($user['sampai']));
$jenis=($user['jenis']);
$ket=($user['persetujuan']);

}

$tampilpeg=mysql_query("SELECT * FROM 	tb_pegawai");
while($peg=mysql_fetch_array($tampilpeg)){

	$nip=($peg['nip']);
	$namapegawai=($peg['nama']);
}

$tampiluser=mysql_query("SELECT * FROM 	tb_user");
while($peg=mysql_fetch_array($tampiluser)){

	$id_user=($peg['id_user']);
	$nama_user=($peg['nama_user']);
}


$tempat="Serang, ";

//$tanggalmulaicuti = $row['dari'];
//$tglmulaicutifix=date("d F Y",strtotime($tanggalmulaicuti));
//$tanggalselesaicuti = $row['sampai'];
//$tglselesaicutifix=date("d F Y",strtotime($tanggalselesaicuti));
//$namapegawai = $row['nmpegawai'];


//mengisi judul dan header tabel
$header 				= "Surat Pengajuan Cuti";
$top 					= "Yang bertanda tangan dibawah ini bermaksud ingin mengajukan cuti sebagai berikut :";
$nama 					= "Nama          		 : $namapegawai";
$tglcutimulai 			= "Tanggal Mulai Cuti    : $dari";
$tglcutiselesai 		= "Tanggal Selesai Cuti  : $sampai";
$alasancuti				= "Alasan Cuti  		 : $jenis";
$status 				= "Status Cuti  		 : $ket";
$content				= "Dengan ini mengajukan permintaan cuti selama hari yang telah diajukan terhitung sejak tanggal $dari";
$content2				= "Demikian surat permintaan cuti yang saya buat.";
$footer 				= "$tgl";
$footer2 				= "Note: surat ini berlaku untuk yang berstatus terverifikasi.";

class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('img/Harfa.png',20,10,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',14);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(30,10,'LAZ HARFA BANTEN',0,0,'C');

	    $this->Ln();
	    $this->SetFont('Arial','B',12);
	    $this->Cell(190,10,'Lembaga Amil Zakat Harapan Duafah, Banten.',0,0,'C');
	    // Line break

	    $this->Line(10, 37, 210-10, 37);
	    $this->Line(10, 39, 210-10, 39);
	    $this->Ln(15);
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
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//tampilan Judul Laporan
$pdf->SetFont('Arial','B','16'); //Font Arial, Tebal/Bold, ukuran font 16
$pdf->Cell(0,25, $header, '0', 1, 'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,20, $top, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(10,1, $nama, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $tglcutimulai, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $tglcutiselesai, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $alasancuti, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $status, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $content, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,1, $content2, '0', 1, 'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(0,10, $footer, '0', 1, 'R');

$pdf->Ln(1);
$pdf->Cell(170,0,'',0,0,'');
$pdf->Cell(18,0,"Menyetujui",0,0,'R');

$pdf->Ln(20);
$pdf->Cell(160,0,'',0,0,'');
$pdf->Cell(28,0,"$_SESSION[nama_user] HRD",0,0,'R');

$pdf->Ln(20);
$pdf->SetFont('Times','',7);
$pdf->Cell(0,2, $footer2, '0', 1, 'L');

//output file pdf
$pdf->Output('Surat-cuti.pdf', 'I');
?>
