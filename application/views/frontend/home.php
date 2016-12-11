<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"  />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/fonts/fonts.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/fonts/materialdesignicons.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/fonts/font-awesome.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>assets/favicon.ico" type="image/x-icon">

<title>Rush Courier</title>
</head>
<body  id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	
    <header class="header_main">
    	<div class="container navbar-fixed-top">
        	<nav class="navbar">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/images/rush.gif" width="152" height="45"></a>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden"><a href="#page-top" class="page-scroll">top</a></li>
                        <li><a href="#" class="page-scroll">Beranda</a></li>
                        <li><a href="#overview" class="page-scroll">Profil</a></li>
                        <li><a href="<?php echo site_url('home/regmember'); ?>" class="page-scroll">Registrasi</a></li>
                        <li><a href="#contact" class="page-scroll">Kontak</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="banner">
        	<div class="container">
                <div class="col-sm-5 col-xs-12">
                    <div class="theme_first">
                        <div class="theme_head">
                            <h1><span>Rush Courier</span></h1>
 							<small>city courier</small>
                        </div>
                        <div class="theme_first_text">
                        	<p>
                            	Rush Courier adalah salah satu usaha yang bergerak dalam bidang jasa layanan pengiriman barang,
                                dokumen, tagihan dan lain-lain. Dengan didukung oleh sumber daya yang handal, menjadikan pengiriman
                                yang anda percayakan kepada kami dapat sampai sesuai dengan waktu yang ditentukan. 
							</p>
							<p>
								Pesan pengiriman sekarang juga, kami siap melayani anda.
                            </p>
                        </div>
                        <div class="theme_first_button">
                           <a href="<?php echo site_url(); ?>home/regmember" class="btn btn-lg btn-primary"><span class="mdi mdi-inbox"></span> Registrasi</a>
                           <a href="<?php echo site_url('authen'); ?>" class="btn btn-lg btn-warning" target="blank"><span class="mdi mdi-inbox"></span> Pesan</a>
                           <p>* Sebelum pesan, registrasi terlebih dahulu</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <div class="banner_image">
                    	<img src="<?php echo base_url(); ?>assets/images/gbr_web1.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!------------------------------------HEADER END------------------------------------------->
    <!------------------------------------OVERVIEW START------------------------------------------->
    <section id="overview">
    	<div class="container">
        	<div class="overview">
            	<div class="mac">
                	<img src="<?php echo base_url(); ?>assets/images/shpp2.png"  alt=""/>
                </div>
                <div class="overviewinos">
                	<h2 class="overview_head">Profil Rush Courier</h2>
                    <p>
                    	Rush Courier satu konsep pusat layanan sehingga tidak hanya memberikan kemudahan tetapi juga mampu
                        memberikan pelayanan yang dapat meningkatkan "Supply Chain" dan memberikan keunggulan yang lebih
                        kompetitif. Didukung dengan segenap mitra kerja dan sumber daya manusia yang terlatih dan teruji
                        menempatkan RUSH Courier sebagai perusahaan penyedia layanan jasa transportasi yang lengkap, handal
                        dan terpercaya.
                    </p>
            
                    <h5><b>Visi</b></h5>	
                    <ol>
                    	<li>
                            Menjadi perusahaan jasa layanan kurir dan kargo yang mampu memberikan pelayanan terbaik dan profesional
                            dengan biaya kompetitif dan bersaing secara global.
                        </li>
                        <li>
                            Membantu pengusaha mengembangkan core businessnya melalui layanan kurir dan kargo di Indonesia.
                        </li>
                    </ol><br>
                    <h5><b>Misi</b></h5>    
                    <ol>
                        <li>
                            Menjadi perusahaan yang mengutamakan kepuasan pelanggan dengan layanan profesional.
                        </li>
                        <li>
                           Selalu meningkatkan kualitas secara berkala untuk meningkatkan value added (nilai tambah) dan kepercayaan
                           dari pelanggan.
                        </li>
                        <li>
                            Mengembangkan dan memelihara sistem terpadu jemput-kirim dari dan ke pelanggan di seluruh jaringan pelayanan
                        </li>
                    </ol>
                    
                </div>
            </div> 
        </div>
    </section>
    <!------------------------------------OVERVIEW END------------------------------------------->
    <!------------------------------------FEATURES START------------------------------------------->
    <section id="features">
    	<div class="container">
        	<div class="feature">
              	<div class="local_heading">
                	<h2>FITUR</h2>
                </div>
                <div class="feature_content">
                    <div class="feature_inner">
                        <div class="feature_img">
                            <img src="<?php echo base_url(); ?>assets/images/fe1.png" alt="" />
                        </div>
                        <div class="feature_text">
                            <h2 class="feature_text_head">Pemesanan Via Online</h2>
                            <p>Sekarang telah diberikan fitur baru dari kami, para pelanggan kami bisa melakukan pemesanan via website kami dengan cara melakukan Registrasi terlebih dahulu. Kemudian para pelanggan bisa melakukan pemesanan pengiriman kepada kami. Fasilitas lihat posisi barang kiriman bisa diakses dalam akun masing-masing. Nikmati layanan baru dari kami, sekarang layanan kami semakin memudahkan anda. Ayo banyak pesan pengiriman paketnya.</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------FEATURES END------------------------------------------->
	<!------------------------------------PRICING START------------------------------------------->
    <section id="pricing">
    	<div class="container">
        	<div class="local_heading">
                <h2>HARGA</h2>
            </div>
        	<div align="center">
            	<table border="1" style="color:white; border:white; border-collapse:collapse; style="margin:5px 3px 3px 3px;">
                	<tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">PAKET</td>
                        <td style="padding: 5px 5px 5px 5px;">LAYANAN/TUJUAN</td>
                        <td style="padding: 5px 5px 5px 5px;">HARGA</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 5,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 10,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">EXPRESS (2-3 JAM) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 17,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) /  SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 7,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) /  SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 12,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">EXPRESS (2-3 JAM) /  SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 17,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) /  GRESIK</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 10,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">Dokumen/Surat/Olshop</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) /  GRESIK</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 20,000</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 5,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 10,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                    	<td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">EXPRESS (2-3 JAM) / SURABAYA</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 17,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                        <td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) / SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 7,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                        <td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) / SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 12,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                        <td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">EXPRESS (2-3 JAM) / SIDOARJO</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 17,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                        <td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">REGULER (3 HARI) / GRESIK</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 10,000 (3 kg pertama)</td>
                    </tr>
                    <tr>
                        <td style="color:white; padding: 5px 5px 5px 5px;">PAKET DAN BARANG</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">SAMEDAY (1 HARI) / GRESIK</td>
                        <td style="color:white; padding: 5px 5px 5px 5px;">IDR 20,000 (3 kg pertama)</td>
                    </tr>
                    
                    
                </table>
                <div class="alert_dash">
                	<p class="alert_p">Order (Pemesanan) minimal 3 hari sebelum pengiriman</p>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------PRICING END------------------------------------------->
    <!------------------------------------CONTACT START------------------------------------------->
    <section id="contact">
    	<div class="container">
        	<div class="local_heading">
                <h2>CONTACT</h2>
            </div>
            <div class="contact">
                            	
            </div>
        </div>
    </section>
    <!------------------------------------CONTACT END------------------------------------------->
    <!------------------------------------FOOTER START------------------------------------------->
    <footer id="footer">
    	<div class="container">
        	<div class="footer">
            	<div class="copyright">
                	<p><span>Rush Themes |</span> Copyright &copy; 2016. Design By: MIFTAH F</p>
                </div>
                <div class="footer_menu">
                	<ul>	
                        <li><a href="#overview" >Overview</a></li>
                        <li><a href="#" >Features</a></li>
                        <li><a href="#" >Pricing</a></li>
                        <li><a href="#" >Reviews</a></li>
                        <li><a href="#" >Support</a></li>
                        <li><a href="#" >Client Login</a></li>
                    </ul>    
                </div>
            </div>
        </div>
    </footer>
    <!------------------------------------FOOTER END------------------------------------------->
    <!------------------------------------POPUP1 START------------------------------------------->
    <div id="myModal1" class="modal fade">
    	<div class="popup">
        <button type="button" class="close_it" data-dismiss="modal"><img src="images/cross.png" alt="" /></button>
    		<p>Thank You For Downloading</p>	
        	<h1>Sell<strong>Theme</strong> - Sales Landing Page</h1>
            
        	<!--<small>Your file download will start soon... If not <a href="#" id="dd1">Click here</a></small>-->
            <div id="counter-text"> Please Wait For <span id="counter">  </span> Seconds. </div>
         	<small id="defalut_link">Your file download will start soon... If not <a href="<?php echo base_url(); ?>assets/images.rar" id="dd1">Click here</a></small>
        	<div class="share">
        		<a href="#"><span class="fa fa-share-alt"></span></a>
            	<span class="h">LIKE IT?</span>
				<small>Share it with the world !!</small>
        	</div>
        	<div class="social_share">
            	<div class="social">
                	<a href="#">
                    	<div class="popover_plug">
                        	24
                        </div>
                        <span class="fb"><i class="fa fa-facebook"></i> Like</span>
                    </a>
                </div>
                <div class="social">
                	<a href="#">
                    	<div class="popover_plug">
                        	69
                        </div>
                        <span class="twe"><i class="fa fa-twitter"></i>Tweet</span>
                    </a>
                </div>
                <div class="social">
                	<a href="#">
                    	<div class="popover_plug">
                        	11k
                        </div>
                        <span class="pin"><i class="fa fa-pinterest"></i>Pin it</span>
                    </a>
                </div>
                <div class="social">
                	<a href="#">
                    	<div class="popover_plug">
                        	37
                        </div>
                        <span class="goog"><i class="fa fa-google-plus"></i> Share</span>
                    </a>
                </div>
            </div>
            <div class="copy_link">
            	<p>Link it on your blog or website</p>
                <p class="text-muted">Copy this link ( Right Click + “Copy” )</p>
                <p><a href="http://webziner.net">http://webziner.net</a></p>
            </div>
    	</div>    
    </div>
    <!------------------------------------POPUP1 END------------------------------------------->
    
    
<script src="js/jquery.min.js" type="text/javascript"></script>  <!-------------MAIN JS------------------>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script> <!-------------FOR BOOTSTRAP------------------>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js" type="text/javascript"></script> <!-------------FOR SCROOL EFFECT------------------>
<script src="<?php echo base_url(); ?>assets/js/scrolling-nav.js" type="text/javascript"></script>  <!-------------FOR POINT TO WAY NAVIGATION------------------>

<script src="<?php echo base_url(); ?>assets/js/jquery.backTop.js" type="text/javascript"></script>
 <!-------------FOR POPUP------------------>   
<script type="text/javascript">
		$(document).ready(function(){
			$(".d1").click(function(){
			$("#myModal1").modal('show');
		});
	});
</script>
<!--<script>
	$(document).ready(function() {
        $('#d1').click(function() {
    		var downloadButton = document.getElementById("d1");
			var pop_block = document.getElementById('dd1');
			var counter = 10;
			var newElement = document.createElement("p");
			newElement.innerHTML = "You can download the file in 10 seconds.";
			var id;
			pop_block.parentNode.replaceChild(newElement, pop_block);
			id = setInterval(function() {
				counter--;
				if(counter < 0) {
					newElement.parentNode.replaceChild(pop_block, newElement);
					clearInterval(id);
					
				} else {
					newElement.innerHTML = "You can download the file in " + counter.toString() + " seconds.";
				}
			}, 1000);        
        });
		$('#d2').click(function() {
    		var downloadButton = document.getElementById("d2");
			var pop_block = document.getElementById('dd2');
			var counter = 10;
			var newElement = document.createElement("p");
			newElement.innerHTML = "You can download the file in 10 seconds.";
			var id;
			pop_block.parentNode.replaceChild(newElement, pop_block);
			id = setInterval(function() {
				counter--;
				if(counter < 0) {
					newElement.parentNode.replaceChild(pop_block, newElement);
					clearInterval(id);
				} else {
					newElement.innerHTML = "You can download the file in " + counter.toString() + " seconds.";
				}
			}, 1000);        
        });
    });
</script>-->
<script>
$(document).ready(function()
{
/*
$("#post_msg").click(function()
{*/
	$("#ajaxform").submit(function(e)
	{
	//	$("#simple-msg").html("<img src='loading.gif'/>");
		var postData = $(this).serializeArray();
		var formURL = $(this).attr("action");

		$.ajax(
		{
			url : formURL,
			type: "POST",
			data : postData,
			beforeSend : function(){
		      	$("#simple-msg").empty();
		    },
			success:function(data,textStatus, errorThrown) 
			{
				console.log(data);
				var obj = JSON.parse(data);
				$("#simple-msg").html('<pre><code class="prettyprint">'+obj.mess+'</code></pre>');
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				$("#simple-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
			}
		});
	    e.preventDefault();	//STOP default action
	   
	});
		
	//$("#ajaxform").submit(); //SUBMIT FORM
});
/*
});*/
</script>




<script type="text/javascript">
var glbalfile;
var time;
var timer;
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var counter=10;
var id;
function download(file) {
	id = setInterval(function () {
		counter=counter-1;
		if (counter == 0) {
			clearInterval(id);
			document.getElementById("counter-text").style.display="none";
			window.location=getAbsolutePath()+ file;
		}else {
			document.getElementById("counter").innerHTML =counter.toString();
		}
   }, 1000);
};
</script>    
<script type="text/javascript">
$(document).ready( function() {
	  $('#backTop').backTop({
		  'position' : 1600,
		  'speed' : 500,
		  'color' : 'red',
	  });
 });
 </script>
 <script>
 $(function() {
  $('a[data-auto-download]').each(function(){
    var $this = $(this);
    setTimeout(function() {
      window.location = $this.attr('href');
    }, 500);
  });
});
 </script>        
</body>
</html>
