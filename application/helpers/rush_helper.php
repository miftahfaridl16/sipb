<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function koderesi($panjang) {
   		
   	   $pengacak = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
	   
	   $string = '';
	   
	   for($i = 0; $i < $panjang; $i++) {
	   		
	   		$pos = rand(0, strlen($pengacak)-1);
	   		$string .= $pengacak{$pos};
   		}

    	return $string;
	}

	//Format Tanggal ke yyyy-mm-dd
	function date_to_en($tanggal){

		$tgl = date('Y-m-d', strtotime($tanggal));
		
		if($tgl == '1970-01-01'){

			return '';

		} else {

			return $tgl;

		}
	}

	// Format Tanggal ke dd-mm-yyyy
	function date_to_id($tanggal){

		$tgl = date('d-m-Y', strtotime($tanggal));

		if($tgl == '01-01-1970'){

			return '';
			
		} else {

			return $tgl;
		}
	}
