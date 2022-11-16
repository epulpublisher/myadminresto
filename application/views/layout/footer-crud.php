</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>/asset/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>/asset/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>/asset/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>/asset/vendors/scripts/layout-settings.js"></script>
<script src="<?= base_url() ?>/asset/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>/asset/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/asset/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/asset/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/asset/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/asset/vendors/scripts/dashboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
	if ($("#add_create").length > 0) {
		$("#add_create").validate({
			rules: {
				no_po_supplier: {
					required: true,
				},
				type: {
					required: true,
				},
				brand: {
					required: true,
				},
				product: {
					required: true,
				},
				serial_number: {
					required: true,
				},
			},
			messages: {
				no_po_supplier: {
					required: '<p style="color:red;">This is required.</p>',
				},
				type: {
					required: '<p style="color:red;">This is required.</p>',
				},
				brand: {
					required: '<p style="color:red;">This is required.</p>',
				},
				product: {
					required: '<p style="color:red;">This is required.</p>',
				},
				serial_number: {
					required: '<p style="color:red;">This is required.</p>',
				},
			},
		})
	}
</script>
<script type='text/javascript'>
	// baseURL variable
	var baseURL = "<?php echo base_url(); ?>";
	$(document).ready(function() {
		$('#sel_vendor').change(function() {
			var no_po_supplier = $(this).val();
			// AJAX request
			$.ajax({
				url: '<?= base_url() ?>/getbrand',
				method: 'post',
				data: {
					no_po_supplier: no_po_supplier
				},
				dataType: 'json',
				success: function(response) {
					// Remove options 
					$('#sel_brand').find('option').remove();
					// Add options
					$.each(response, function(index, data) {
						$('#sel_brand').append('<option value="' + data['brand'] + '">' + data['brand'] + '</option>');
					});
				}
			});
		});
	});
</script>
</body>

</html>
