

$('#op').hide();

function sort(btnobj)
{
   $(btnobj).text('shorting...');
   $('#op').hide();
   $.ajax({
       url: 'ajax.php',
       type: 'POST',
       data: {op: 'short', longurl: $('#urlin').val()},
       success:function(result){
           // return console.log(result);
           if(result.status == 1)
           {
               const homeurl = location.protocol+'//'+location.hostname;
               $('#urlout').val(homeurl+'/'+result.shorturlid);
               $('#op').fadeIn();
               $('#urlin').val('')
           }
           else
                alert(result.msg);
           $(btnobj).text('short');
       },
       error:function(response)
       {
           console.log(response);
           $(btnobj).text('short');
       }
   });
}

function copytoclipboard(btnobj,inputid)
{
   
    $('#'+inputid).prop("disabled", false).select();
    document.execCommand("copy");
    $('#'+inputid).prop("disabled", true);
    $(btnobj).text('copied');
}

var ctx = document.getElementById('links-create-chart').getContext('2d');

	var days = Array.from(Array(31).keys());

	function createchart(days)
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

	createchart(days);