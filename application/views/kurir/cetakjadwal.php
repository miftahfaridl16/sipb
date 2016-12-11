<?php
	
	// Cetak Resi

	class PDF extends FPDF{

		// Page Header
		function header(){

			$this->setFont('Arial','',10);
            $this->setFillColor(255,255,255);
            $this->cell(50,6,"Rush Courier",0,0,'L',1); 
            $this->cell(80,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
            //$this->Image(base_url().'assets/dist/img/user7-128x128.jpg', 10, 25,'20','20','jpeg');
            
            /*$this->Ln(12);
            $this->setFont('Arial','',14);
            $this->setFillColor(255,255,255);
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,'Laporan daftar pegawai gubugkoding.com',0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,"Periode : ".date('M Y'),0,1,'L',1); 
            $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(100,6,'Lokasi : Semarang, Jawa Tengah',0,1,'L',1); 
            
            
            $this->Ln(5);
            $this->setFont('Arial','',10);
            $this->setFillColor(230,230,200);
            $this->cell(10,6,'No.',1,0,'C',1);
            $this->cell(105,6,'Nama Lengkap',1,0,'C',1);
            $this->cell(30,6,'No. HP',1,0,'C',1);
            $this->cell(50,6,'Jenis Kelamin',1,1,'C',1);*/

            $this->Ln(5);
            $this->setFont('Arial','', 20);
            $this->cell(130,6, 'Rush | Courier',0,2,'C');
            $this->Ln(2);
            $this->setFont('Arial','', 16);
            $this->cell(130,6, 'Jadwal Kurir',0,2,'C');
            $this->Ln(2);
 
		}

		function Content($kirim){

			$this->setFont('Arial', '', 8);
			$this->cell(5,7,'No',1,0,'C',0);
			$this->cell(23,7,'No Resi',1,0,'C',0);
			$this->cell(32,7,'Penerima',1,0,'C',0);
			$this->cell(35,7,'Alamat',1,0,'C',0);
			$this->cell(20,7,'Tgl',1,0,'C',0);
			$this->cell(20,7,'Status',1,0,'C',0);
			$this->Ln();

			foreach($kirim as $k){
				$kn = $k->kurir_nama;
				$this->setFont('Arial', '', 7);
				$this->cell(5,7,$k->ambil_prioritas,1,0,'C',0);
				$this->cell(23,7,$k->no_resi,1,0,'C',0);
				$this->cell(32,7,$k->penerima_nama,1,0,'C',0);
				$this->cell(35,7,$k->penerima_alamat,1,0,'C',0);
				$this->cell(20,7,$k->ambil_tgl,1,0,'C',0);
				$this->cell(20,7,$k->ambil_status,1,0,'C',0);
				$this->Ln();
			}

			$this->Ln(2);
			$this->setFont('Arial','', 10);
            $this->cell(130,6, 'Kurir : '.$kn,0,0,'L');
		

		}
	}

	$pdf = new PDF('P', 'mm', 'A5');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Content($kirim);
	$pdf->Output();

?>