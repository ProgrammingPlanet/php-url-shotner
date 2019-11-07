

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

    	<div class="row h-25 bg-light m-2">
    		<div class="col-lg-10 mx-auto my-5 ">
    			
				<div class="input-group mb-3" id="shrtdiv">
				    <input type="text" class="form-control form-control-lg col-lg-9" placeholder="https://domain.com/some-cool-news/today" id="urlin">
				    <input type="text" class="form-control form-control-lg col-lg-3" placeholder="alias(optional)" id="alias">
                    <div class="input-group-append">
                        <button class="btn btn-lg btn-primary px-5" onclick="sort(this)">short</button>
                    </div>
		        </div>
		        
		        <div class="mt-3">
		            <div class="col-lg-10 mx-auto p-3 animated bounceInLeft" id="op">
		                <h4 class="text-center">short url is ready</h4>
		                <div class="col-8 input-group mx-auto" id="">
		                  <input type="text" class="form-control"  id="urlout" disabled="true">
		                  <div class="input-group-append">
		                    <button class="btn btn-success px-3" onclick="copytoclipboard(this,'urlout')">copy</button>
		                  </div>
		                </div>
		            </div>
		        </div>

    		</div>
    	</div>

    	<div class="row mt-5">
    		<div class="col-lg-11 mx-auto p-3 my-3 bg-white shadow">
    			<canvas id="links-create-chart" class=""></canvas>
    		</div>
    		

    	</div>
        
				
        
    </div>
</div>

<script>
	var ctx = document.getElementById('links-create-chart').getContext('2d');

	var days = Array.from(Array(31).keys());

	function createcharte(days)
	{
		var chart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: days, //['January', 'February', 'March'],
		        datasets: [
			        {
			            label: 'Number of shorted links',
			            fill: false,
			            backgroundColor: 'rgb(0, 255, 47)',
			            borderColor: 'rgb(0, 255, 47)',
			            data: [2,6,15,17,20,25,21,18,15,25,18,12,30,18,2,6,15,17,20,25,21,18,15,25,18,12,30,18]
			        },
			        {
			            label: 'Second sample dataset',
			            fill: false,
			            backgroundColor: 'rgb(255, 238, 0)',
			            borderColor: 'rgb(255, 238, 0)',
			            data: [25,18,12,30,18,2,6,15,17,15,17,20,25,21,18,20,25,21,18,15,25,20,25,21,18,20,25,21,32]
			        }
			    ]
		    },

		    // Configuration options
		    
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Statistics of shorten links activity (not implemented)'
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
							labelString: 'Visits'
						}
					}]
				}
			}
		});
	}

	createcharte(days);
</script>

	