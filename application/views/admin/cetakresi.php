<?php
	
	// Cetak Resi

	class PDF extends FPDF{

		// Page Header
		function header(){

			$this->setFont('Arial','',10);
            $this->setFillColor(255,255,255);
            $this->cell(50,6,"Rush Courier",0,0,'L',1); 
            //$this->cell(80,6,"Printed date : " . date('d/m/Y'),0,1,'R',1); 
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
     
		}

		function Content($pesan){

			foreach($pesan as $p){
				$nr = $p->no_resi;
				$pm = $p->pelanggan_nama;
				$pa = $p->pelanggan_alamat;
				$pk = $p->pelanggan_kota;
				$pn = $p->pelanggan_telp;
				$np = $p->penerima_nama;
				$ap = $p->penerima_alamat;
				$kp = $p->kota_nama;
				//$cp = $p->nama_kec;
				$tp = $p->penerima_telp;
				$pnm = $p->paket_jenis;
				$pln = $p->layanan_nama;
				$bt = $p->berat;
				$by = $p->biaya;
				$tb = $p->total_biaya;
			}

			$this->Ln(15);
			$this->setFont('Arial','',14);
			$this->cell(24,6,'No. Resi :', 0,0,'L');
			$this->setFont('Arial','B',20);
			$this->cell(18,6,$nr,0,2,'L');

			$this->Ln(5);
			$this->setFont('Arial','B',11);
			$this->cell(24,6,'Pengirim : ', 0,2,'L');
			$this->setFont('Arial','',11);
			$this->cell(24,6,$pm, 0,2,'L');
			$this->cell(24,6,$pa, 0,2,'L');
			$this->cell(24,6,$pk, 0,2,'L');
			$this->cell(24,6,$pn, 0,2,'L');

			$this->Ln(5);
			$this->setFont('Arial','B',11);
			$this->cell(24,6,'Penerima : ', 0,2,'L');
			$this->setFont('Arial','',11);
			$this->cell(24,6,$np, 0,2,'L');
			$this->cell(24,6,$ap, 0,2,'L');
			$this->cell(24,6,$kp, 0,2,'L');
			//$this->cell(24,6,$cp, 0,2,'L');
			$this->cell(24,6,$tp, 0,2,'L');

			$this->Ln(5);
			$this->setFont('Arial','B',11);
			$this->cell(30,6,'Jenis Kiriman : ',0,0,'L');
			$this->setFont('Arial','',11);
			$this->cell(13,6,$pnm.' '.$pln,0,2,'L');
			$this->Ln(1);
			$this->setFont('Arial','B',11);
			$this->cell(15,6,'Berat : ',0,0,'L');
			$this->setFont('Arial','',11);
			$this->cell(4,6,$bt,0,0,'L');
			$this->cell(2,6,'kg',0,2,'L');
			$this->Ln(1);
			$this->setFont('Arial','B',11);
			$this->cell(15,6,'Biaya : ',0,0,'L');
			$this->setFont('Arial','',11);
			$this->cell(7,6,'Rp. ',0,0,'L');
			$this->cell(4,6,$by,0,2,'L');
			$this->Ln(1);
			$this->setFont('Arial','B',11);
			$this->cell(15,6,'Total : ',0,0,'L');
			$this->setFont('Arial','',11);
			$this->cell(7,6,'Rp. ',0,0,'L');
			$this->cell(4,6,$tb,0,2,'L');
			// TTD
			$this->Ln(7);
			$this->setFont('Arial','',11);
			$this->cell(80,6,'Petugas',0,0,'C');
			$this->cell(25,6,'Pengirim',0,2,'C');

			$this->Ln(14);
			$this->setFont('Arial','',11);
			$this->cell(80,6,'(......................)',0,0,'C');
			$this->cell(25,6,'(......................)',0,2,'C');
		}
	}

	$pdf = new PDF('P', 'mm', 'A5');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Content($pesan);
	$pdf->Output();

?>