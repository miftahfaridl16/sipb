<?php
	
	class PDF extends FPDF{

		// Page Header
		function Header(){

			$this->Image(base_url().'assets/images/rush.gif', 1.5, 1.1, 3);
			$this->SetFont('Arial', 'B', 9);
			$this->SetFillColor(255,255,255);
			$this->Cell(4);
			$this->Cell(1,0.5,'Rush Courier',0,2,'L',1);
			$this->SetFont('Arial', '', 9);
			$this->Cell(0.1,0.4,'Perum Pondok Chandra Jl. Durian IV/30 Surabaya',0,2,'L',1); 
			$this->Cell(0.1,0.5,'031-8708085',0,2,'L',1); 
			$this->Cell(0.1,0.2,'rush.courier@yahoo.com',0,2,'L',1); 
			$this->Ln();
			$this->Cell(0.1,0.3,'------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,2,'L',1); 
			$this->Ln();
			$this->SetFont('Arial','', 16);
			$this->cell(20,1,'Laporan Omset Bulanan',0,2,'C',1);
			//$this->cell(5,1,'Bulan : '.$bln,0,2,'C',1);
			$this->Ln();
			$this->SetFont('Arial','',10);
			$this->cell(3.1);
			$this->cell(3,0.8,'No Resi',1,0,'C',0);
			$this->cell(4,0.8,'Penerima',1,0,'C',0);
			$this->cell(2,0.8,'Berat',1,0,'C',0);
			$this->cell(2,0.8,'Biaya',1,0,'C',0);
			$this->cell(2,0.8,'Jumlah',1,0,'C',0);
			$this->Ln();
		}

		function Content($isi, $tot){
			
			foreach($isi as $s){
				$this->cell(3.1);
				$this->cell(3,0.8,$s->no_resi,1,0,'C',0);
				$this->cell(4,0.8,$s->penerima_nama,1,0,'C',0);
				$this->cell(2,0.8,$s->berat,1,0,'C',0);
				$this->cell(2,0.8,$s->biaya,1,0,'C',0);
				$this->cell(2,0.8,$s->total_biaya,1,0,'C',0);
				$b = $s->bulan;
				$h = $s->tahun;
				$this->Ln();
			}
				foreach ($tot as $k) {
					$tt = $k->total;
				}

				$this->cell(3.1);
				$this->cell(13,0.8,'Total : '.$tt,1,0,'R',0);

				if($b==1){
					$bln = 'Januari';
				} elseif($b==2){
					$bln = 'Februari';
				} elseif($b==3){
					$bln = 'Maret';
				} elseif($b==4){
					$bln = 'April';
				} elseif($b==5){
					$bln = 'Mei';
				} elseif($b==6){
					$bln = 'Juni';
				} elseif($b==7){
					$bln = 'Juli';
				} elseif($b==8){
					$bln = 'Agustus';
				} elseif($b==9){
					$bln = 'September';
				} elseif($b==10){
					$bln = 'Oktober';
				} elseif($b==11){
					$bln = 'November';
				} elseif($b==12){
					$bln = 'Desember';
				}

				$this->Ln();
				$this->SetFont('Arial','',11);
				$this->cell(13,0.8,'Bulan : '.$bln,0,0,'R',0);
				$this->cell(4,0.8,'Tahun : '.$h,0,0,'C',0);
		}

	}

	$pdf = new PDF('P','cm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Content($isi, $tot);
	$pdf->Output();

?>