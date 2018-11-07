<!-- SLIDER Chart -->
<div uk-slider="right: true; sets: true" >

	<div class="uk-position-relative uk-visible-toggle uk-text-center uk-text-center@s">

		<ul class="uk-slider-items uk-child-width-1-3@s uk-grid " id="spasial1">
			
			
		</ul>

		<a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
		<a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>

	</div>

</div>

<div class="uk-position-relative uk-padding" uk-slider>

	<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m uk-text-center@s uk-flex-center" id="spasial2">
		
	</ul>

	<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
	<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

</div>

<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script rel="javascript" type="text/javascript" src="<?php echo base_url('assets/js/Chart.js');?>"></script>
<script type="text/javascript">
$(document).ready( function() {

	$.ajax({
		url: "<?php echo site_url('Dbackend/spasial_chart/');?>",
		dataType: "json",
		success: function(data) {
			
			var labelss = [];
			for (i = 0; i < data.length; i++) {
				
				if (i < 3 ){
					$('#spasial1').append('<li style="padding-left:60px;padding-right: 40px;">'+
						'<div class="uk-card" >'+
							'<div class="uk-card-media-top">'+
								'<canvas id="chart_'+i+'" width="500" height="600"></canvas>'+
							'</div>'+
							'<div class="uk-margin" hidden>'+
								'<input type="text" name="source[]" value="'+data[i]['data_source']+'">'+
								'<input type="text" name="group[]" value="'+data[i]['grouping']+'">'+
								'<input type="text" name="tipe[]" value="'+data[i]['tipe']+'">'+
							'</div>'+
							'<div class="uk-card-body">'+
								'<h4>'+data[i]['judul']+'</h4>'+
								'<p style="font-size:10px">berdasarkan : '+data[i]['grouping']+'</p>'+
							'</div>'+
						'</div>'+
					'</li>');
				}else{
					$('#spasial2').append('<li style="padding-right: 30px;">'+
						'<div class="uk-card-media-top">'+
							'<canvas id="chart_'+i+'" width="200" height="200"></canvas>'+
						'</div>'+
						'<div class="uk-margin" hidden>'+
								'<input type="text" name="source[]" value="'+data[i]['data_source']+'">'+
								'<input type="text" name="group[]" value="'+data[i]['grouping']+'">'+
								'<input type="text" name="tipe[]" value="'+data[i]['tipe']+'">'+
							'</div>'+
						'<div class="uk-card-body">'+
							'<p style="font-size:9px">'+data[i]['judul']+'<br> berdasarkan : '+data[i]['grouping']+'</p>'+
						'</div>'+
					'</li>');
				}
				
			}
			// console.log(labelss);

		}
	});

	setTimeout(() => {
		var source = $('input[name^=source]').map(function(idx, elem) {
			return $(elem).val();
		}).get();
		
		var group = $('input[name^=group]').map(function(idx, elem) {
			return $(elem).val();
		}).get();

		var tipe = $('input[name^=tipe]').map(function(idx, elem) {
			return $(elem).val();
		}).get();

		var color = ['#b82c2c', '#f49f59', '#fffa8b', '#386b30', '#ec2d4a', '#ff0061', '#ebbcfc', '#ffbed1', '#ffee8c', '#fba44a', '#cc225e', '#513026', '#404e5c', '#4f6272', '#b7c3f3', '#dd7596', '#cf1259', '#fb4353', '#641363', '#fbbb8f'];

	// console.log(source);
	console.log(group);
		url = '<?php echo site_url('Dbackend/spasial_data/')?>';
		
		
			
			// var k = 0;	
			$.ajax({
				url: url+source+"/"+group,
				dataType: "json",
				success: function(res) {
					// console.log(res.length);
					for (i = 0; i < res.length; i++) {
						chart = new Chart("chart_"+i, {
							// The type of chart we want to create
							type: tipe[i],

							// The data for our dataset
							data: {
								labels: res[i]['label'],
								datasets: [{
									// label: source[k],
									backgroundColor: color,
									borderColor: '#fff',
									data: res[i]['data'],
								}]
							},
							// Configuration options go here
							// options: {}
						});	
					}
				}
			});
			
		
	}, 500);

});


</script>