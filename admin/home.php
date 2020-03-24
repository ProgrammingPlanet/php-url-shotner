

<style>
.form-control{
    border: 0.5px solid #a9a9a9;
}

.form-control::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-weight: 50;
  font-size: 18px;
}
.form-control::-moz-placeholder { /* Firefox 19+ */
  color: pink;
}
.form-control:-ms-input-placeholder { /* IE 10+ */
  color: pink;
}
.form-control:-moz-placeholder { /* Firefox 18- */
  color: pink;
}

</style>

<div class="row h-100">
    <div class="col-12">

    	<div class="row bg-light m-2">
    		<div class="col-lg-10 mx-auto my-5 ">
    			
				<div class="mb-3 text-center" id="shrtdiv">
				    <input type="text" class="form-control col-lg-6 col-md-6 col-sm-6 mt-2 d-inline-block" placeholder="https://domain.com/some-cool-news/today" id="urlin">
				    <input type="text" class="form-control col-lg-3 col-md-3 col-sm-3 mt-2 mb-3 d-inline-block" placeholder="alias(optional)" id="alias">
				    <button class="btn btn-primary px-4 mb-1" onclick="sort(this)">short</button>
                    
		        </div>
		        
		        <div class="mt-3">
		            <div class="col-lg-10 mx-auto p-3 animated bounceInLeft" id="op">
		                <h4 class="text-center">short url is ready</h4>
		                <div class="col-lg-8 col-12 input-group mx-auto" id="">
		                  <input type="text" class="form-control"  id="urlout" disabled="true">
		                  <div class="input-group-append">
		                    <button class="btn btn-success px-3" onclick="copytoclipboard(this,'urlout')">copy</button>
		                  </div>
		                </div>
		            </div>
		        </div>

    		</div>
    	</div>

    	<div class="row mt-2">
    		<div class="col-lg-11 mx-auto p-3 my-3 bg-white shadow">
    		    <span id="graph-loading">preparing graph......</span>
    			<canvas id="links-chart" class=""></canvas>
    		</div>
    		

    	</div>
        
				
        
    </div>
</div>

<script>
	var ctx = document.getElementById('links-chart').getContext('2d');

	var days = [...Array(31).keys() ].map(i=>i+1);

	function createcharte(dataset)
	{
		var chart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: days, //['January', 'February', 'March'],
		        datasets: [
			        {
			            label: 'links visited',
			            fill: false,
			            backgroundColor: 'rgb(0, 255, 47)',
			            borderColor: 'rgb(0, 255, 47)',
			            data: dataset['visits']
			        },
			        {
			            label: 'links created',
			            fill: false,
			            backgroundColor: 'rgb(255, 238, 0)',
			            borderColor: 'rgb(255, 238, 0)',
			            data: dataset['creats']
			        }
			    ]
		    },

		    // Configuration options
		    
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Statistics of shorten links activity(This Month)'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Date'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Counts'
						}
					}]
				}
			}
		});
	}

	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		data: {op:'fetch-graph-data'},
		success:function(result){
			if(result.status)
			{
				$('#graph-loading').hide();
				createcharte(result.data);
			}
			else{
				console.log(result);
			}
		}
	});
</script>

	