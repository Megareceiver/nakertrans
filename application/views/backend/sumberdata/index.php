<table id="detail" class="uk-table uk-table-divider stripe row-border order-column" style="width:100%;">
    <thead>
        <tr>
        	<th class="uk-table-shrink"></th>
            <th class="uk-table-expand">Nama Folder</th>
            <th class="uk-width-small"></th>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($datasource as $data) { ?>
			<tr>
				<td><input class="uk-checkbox" type="checkbox" name="check_[]" value="<?php echo $data['TABLE_NAME']?>"></td>
				<td><?php echo str_replace("_"," ",$data['TABLE_NAME']);?> <?php echo !empty($data['SUMDATA']) ? "- ( ".$data['SUMDATA']." )" : ''; ?></td>
				<td class="uk-text-center">
					<a class="btn-act" href="<?php echo site_url('Sumberdata/detail_data/'.$data['TABLE_NAME'])?>" uk-icon="icon: search" title="lihat"></a>
					<a class="btn-act" href="<?php echo site_url('Sumberdata/exportdata/'.$data['TABLE_NAME'])?>" uk-icon="icon: download" title="export"></a>
					<a class="btn-act" href="#modal-full" uk-toggle uk-icon="icon: refresh" title="validasi" onclick="validasidata('<?php echo $data['TABLE_NAME']?>')"></a>
					<a class="btn-act" href="<?php echo site_url('Sumberdata/droptable/'.$data['TABLE_NAME'])?>" uk-icon="icon: trash" title="hapus"></a>
				</td>
			</tr>	
		<?php } ?>
        
    </tbody>
</table>

<div id="modal-import" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-4">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Import</h4>
        </div>
        <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-slide-bottom-small , uk-animation-slide-bottom-small">
		    <li><a href="#">API</a></li>
		    <li><a href="#">File</a></li>
		</ul>

		<ul class="uk-switcher uk-margin">

		    <li>
                
		    	<fieldset class="uk-fieldset">
					<div class="uk-margin">
			            <input class="uk-input" type="text" placeholder="Nama Folder" id="nametable_api" name="nametable_api">
			        </div>
		    		<div class="uk-margin">
			            <input class="uk-input" type="text" placeholder="url API..." id="url_api" name="url_api">
			        </div>
					<div class="uk-margin">
						<div class="uk-form-label">Publikasi data</div>
						<div class="uk-form-controls uk-form-controls-text">
							<label><input class="uk-radio" type="radio" name="radio1"> Ya</label><br>
							<label><input class="uk-radio" type="radio" name="radio1"> Tidak</label>
						</div>
					</div>
			        <div class="uk-margin">
			        	<button type="submit" class="uk-button uk-button-default" onclick="requestapi()">Request</button>
			        </div>
		    	</fieldset>
                
		    </li>
		    <li>
                <?php //echo form_open_multipart(site_url("Sumberdata/importdata/"), array("class" => "formValidate")) ?>
		    	<fieldset class="uk-fieldset">
		    		<div class="uk-margin">
			            <input class="uk-input" type="text" placeholder="Nama Folder" id="nametable">
			        </div>
			        <div class="uk-margin">
			        	<div uk-form-custom="target: true" style="width: 100%">
				            <input type="file" id="file">
				            <input class="uk-input" type="text" placeholder="Select file" id="file">
				        </div>
			        </div>	
					<div class="uk-margin">
						<div class="uk-form-label">Publikasi data</div>
						<div class="uk-form-controls uk-form-controls-text">
							<label><input class="uk-radio" type="radio" name="radio2" value="Ya"> Ya</label><br>
							<label><input class="uk-radio" type="radio" name="radio2" value="Tidak"> Tidak</label>
						</div>
					</div>
			        <div class="uk-margin">
			        	<button class="uk-button uk-button-default" onclick="requestfile()">Upload</button>
			        </div>
			        <p style="font-size: 10px">(*)Sumber data hanya berasal dari file berformat .xlsx</p>
		    	</fieldset>
                <?php //echo form_close() ?>
		    </li>
		</ul>

    </div>
</div>

<div id="modal-result-import" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-3">

		<!-- <button class="uk-modal-close-default" type="button" uk-close></button> -->
        <div class="uk-modal-header">
            <h5 class="uk-modal-title">Import <br>
			(Header Field)</h5>
        </div>
		
		<fieldset class="uk-fieldset" id="resultform">
		</fieldset>
		<div class="uk-margin" id="eksekusi">
			<button class="uk-button uk-button-default" onclick="submitrequest()">Submit</button>
			<button class="uk-button uk-button-default" onclick="cancel()">Cancel</button>
		</div>
		<div id="proses" style="display:none;">
			<span class="uk-margin-small-right" uk-spinner="ratio: 0.5"> Import data sedang di proses</span>
		</div>
    </div>
</div>

<div id="modal-sortir" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-4">

        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Sortir</h4>
        </div>
		<?php echo form_open_multipart(site_url("Sumberdata/sortir_datasource/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		<div class="uk-margin">
	            <select class="uk-select" name="data_opt">
	            	<option value="MAX">Data Terbanyak</option>
					<option value="MIN">Data Terendah</option>
	            </select>
	        </div>
	        <div class="uk-margin">
	            <select class="uk-select" name="data_sort">
	            	<option value="ASC">A - Z</option>
	            	<option value="DESC">Z - A</option>
	            </select>
	        </div>
	        <div class="uk-margin">
	            <input class="uk-input" type="text" placeholder="Ketik nama folder..." id="tags" name="table_name">
	        </div>
	        <div class="uk-margin">
	        	<button class="uk-button uk-button-default">Filter</button>
	        </div>
    	</fieldset>
		<?php echo form_close() ?>
    </div>
</div>

<div id="modal-export" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-width-1-4">

		<button class="uk-modal-close-default" type="button" uk-close></button>
        <div class="uk-modal-header">
            <h4 class="uk-modal-title">Export</h4>
        </div>
		<?php echo form_open_multipart(site_url("Sumberdata/exportdata_multiple/"), array("class" => "formValidate")) ?>
       	<fieldset class="uk-fieldset">
    		
			<div class="uk-margin" id="table_"></div>

	        <div class="uk-margin">
				<button class="uk-button uk-button-default" id="export">Export</button>
	        </div>
    	</fieldset>
		<?php echo form_close() ?>
    </div>
</div>

<div id="modal-full" class="uk-modal-full" uk-modal style="font-size:12px;">
    <div class="uk-modal-dialog" style="height: -webkit-fill-available;">
		<div class="uk-inline uk-animation-slide-bottom-small" style="height: -webkit-fill-available;width: 100%;">
			
			<div class="uk-position-center uk-overlay uk-text-center">
				<div class="uk-inline" style="width: 100%;">
					<div class="uk-position-center">
					<div class="uk-card uk-card-default uk-width-auto@m" style="width:120px; height:120px;border-radius:100%; background-color: #ed3c6d; margin-bottom:50px">
					
					</div>
					</div>
				</div>

				<div class="uk-padding-large">
					<p>Harap tunggu..., <br>
						Sistem sedang melakukan validasi ke Data pusat Disdukcatpil.</p>
					<p id="tabledata"></p>
					<div>
						<progress id="js-progressbar" class="uk-progress" value="0" max="100"></progress>
					</div>
					<p id="progressdata"></p>
				</div>
			</div>

			<div class="uk-position-medium uk-position-bottom-center uk-overlay uk-text-center">
				<a class="uk-modal-close-full" id="stopvalidasi" tes="" uk-icon="icon: close" style="text-decoration:none; padding:0px; background: unset;position: relative;border:1px solid #999; border-radius:100%;"></a> <br>
			</div>
		</div>

    </div>
</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script>
	function gettable()
	{
		$('#table_').replaceWith('<div class="uk-margin" id="table_"></div>');
		var checkboxes = document.getElementsByName('check_[]');
		var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				vals += ","+checkboxes[i].value;
				$('#table_').append('<input class="uk-input" type="text" name="table_name[]" value="'+checkboxes[i].value+'">');	
			}
		}
		if (vals) vals = vals.substring(1);
		
	}

	function requestapi()
	{
		var url_api = $('#url_api').val();
		
		$.ajax({
			url: url_api,
			dataType: "json",
			success: function( data ) {
				header = Object.keys(data[0]);
				value = [];
				for (let i = 0; i < data.length; i++) {
					value.push(data[i]);
				}
				
				var nametable = $('#nametable_api').val();
				$.ajax({
					url: "<?php echo site_url('Sumberdata/import_fapi/');?>"+nametable,
					type: "post",
					dataType:"json",
					data: { header: header, value: value },
					success: function (data) {
						console.log(data);
						if (data == "success") {
							window.location.reload();
						}
					},
					error: function(xhr, Status, err) {
						console.log(xhr);
					}
				});
			}
		});
	}

	function requestfile()
	{
		var datasend = new FormData();

		datasend.append('nametable', $("#nametable").val());
		datasend.append('file', $("#file")[0].files[0]);
		datasend.append('publikasi', $("input[name='radio2']:checked").val());
		$.ajax({
          url: "<?php echo site_url()?>" + "Sumberdata/importdata",
          type: "POST",
		  dataType: 'json',
          data: datasend,
          processData: false,
          contentType: false,
          cache:false,
		}).done(function (data) {
			console.log(data);
			
			for (let i = 0; i < data['header'].length; i++) {
				$('#resultform').append('<div class="uk-margin">'+
					'<label class="uk-form-label" for="form-horizontal-text">'+data['header'][i]+'</label>'+
					'<div class="uk-form-controls">'+
						'<input class="uk-input" id="form-horizontal-text" type="text" value="'+data['header_column'][i]+'" disabled>'+
					'</div>'+
				'</div>');
			}

			$('#modal-result-import').addClass('uk-open');
			$('#modal-result-import').attr('style','display:block; z-index:9999;');
		});
		return false;
	}

	function submitrequest()
	{
		$('#eksekusi').attr('style', 'display:none;');
		$('#proses').attr('style', 'display:block;');

		var datasend = new FormData();

		datasend.append('nametable', $("#nametable").val());
		datasend.append('file', $("#file")[0].files[0]);
		datasend.append('publikasi', $("input[name='radio2']:checked").val());

		$.ajax({
          url: "<?php echo site_url()?>" + "Sumberdata/submitimport",
          type: "POST",
		  dataType: 'json',
          data: datasend,
          processData: false,
          contentType: false,
          cache:false,
		}).done(function (data) {
			console.log(data);
			if (data == 'true'){
				location.reload();
			}else{
				alert('file gagal di upload, silahkan cek kembali file yang anda upload');
			}
		});
		return false;
	}

	function hapus()
	{
		var checkboxes = document.getElementsByName('check_[]');
		var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				// vals += ","+checkboxes[i].value;
				$.ajax({
					url: "<?php echo site_url('Sumberdata/drop_multipe/');?>"+checkboxes[i].value,
					dataType: "json",
					success: function( data ) {
						console.log(data);
					}
				});
			}
		}
		if (vals) vals = vals.substring(1);

		setTimeout(() => {
			window.location.reload();
		}, 1000);
	}

	function cancel()
	{
		location.reload();
	}
</script>
<script>
  $( function()
  {
	var availableTags = [];
	$.ajax({
		url: "<?php echo site_url('Sumberdata/datasource/');?>",
		dataType: "json",
		success: function( data ) {

		for(var i in data) {    
			availableTags.push(data[i].TABLE_NAME) ;
		}

		$( "#tags" ).autocomplete({
			source: availableTags
			});
		}
	});
  } );
  </script>
<script>
$(document).ready(function()
{
	setTimeout(() => {
        $('#detail_info').hide();
        $('#detail_length').hide();
        $('#detail_filter').hide();
		$('#detail_paginate').attr('style', 'font-size:12px; margin-top:15px');
    }, 500);

	$('#detail').DataTable( {
		scrollY:        "420px",
		scrollX:        true,
		scrollCollapse: true,
		paging:         true,
	} );
});

function validasidata(table_name)
{
	var bar = document.getElementById('js-progressbar');
	$.ajax({
		url: 'http://dplega.syncardtech.com/slim-api/public/list/lembaga/2',
		dataType: "json",
		success: function( resapi ) {
			resapiheader = Object.keys(resapi[0]);
			// ----------------
			$.ajax({
				url: "<?php echo site_url('Sumberdata/get_data_/');?>"+table_name,
				dataType: "json",
				success: function( resdb ) {
					
					var banyakdata = bar.max / resdb.length;
					bar.value = 0;
					jumlah = 0;

					$('#stopvalidasi').attr('tes', '');
					$('#tabledata').replaceWith('<p id="tabledata">'+table_name+'</p>');
					
					var animate = setInterval(function () {

						if ($('#stopvalidasi').attr('tes') != 'stop'){
							// ----------------
							$.ajax({
								url: "<?php echo site_url('Sumberdata/validasi_data/');?>"+table_name,
								type: "post",
								dataType:"json",
								data: { header: resapiheader, value: resapi[jumlah]},
								success: function( data ){

									console.log(data);
									// ------------
									bar.value += banyakdata;
									jumlah += 1;
									var per = Math.floor((bar.value / 100) * 100);
									
									if (per == 100){
										$('#progressdata').replaceWith('<p id="progressdata">100%</p>');
									}else{
										$('#progressdata').replaceWith('<p id="progressdata">'+per+'% : '+jumlah+' dari '+resdb.length+'</p>');
									}

									if (bar.value >= bar.max) {
										
										clearInterval(animate);

										$.ajax({
											url: "<?php echo site_url('Sumberdata/validasi_belum/');?>"+table_name,
											dataType:"json",
											success: function( data ){
												window.location.reload();
											}
										});
									}
									// ----------------
								}
							});
							// ----------------
						}else{
							clearInterval(animate);
						}

					}, 1000);
					// ----------------
				}
			});
			// ----------------
		}
	});
	
}

$('#stopvalidasi').click(function()
{
	$('#stopvalidasi').attr('tes', 'stop');
});
</script>