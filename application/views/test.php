<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
	<head>
		<title>Test!</title>
	</head>
	<body>
		<form method="post" action="#">
			<select id="paket" name="paket">
				<option value="">- Pilih -</option>
				<?php
					foreach($paket as $p){
				?>
					<option value="<?php echo $p->paket_id; ?>"><?php echo $p->paket_nama; ?> / <?php echo $p->paket_layanan; ?> / <?php echo $p->kota_nama; ?></option>
				<?php
					}
				?>
			</select><br><br>
			<input type="text" id="harga" name="harga"><br><br>
			<input type="text" id="estimasi" name="estimasi">
		</form>

		<!-- jQuery 2.2.0 -->
		<script src="<?php echo base_url(); ?>adminlte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
		<!-- Code JQuery Change -->
		<script type="text/javascript">
			
			/*function gethargaestimasi(val){
				$.ajax({
					type:"POST",
					url:"<?php //echo base_url(); ?>test/gethargaest",
					data:'paket_id='+val,
					success: function(data){
						alert(data);
					}

				});
			}*/

			$(document).ready(function(){
				$("#paket").change(function(){
					var paket_id = $("#paket").val();
					$.ajax({
						type:"POST",
						url:"<?php echo base_url(); ?>test/gethargaest",
						data: "paket_id=" + paket_id,
						success:function(data){
							//$("#harga").val(data);
							//alert(data);
							data = data.split("|");
							$("#harga").val(data[0]);
							$("#estimasi").val(data[1]);
						}
					});
				});
			});

		</script>
	</body>
</html>