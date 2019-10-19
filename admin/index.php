<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create New link - Zlink</title>
	<link rel="icon" href="../favicon.ico" type="image/ico" sizes="30x30">
	
	<style>
		body{
			margin: 0;
			padding: 0;
			width: 100vw;
			height: 100vh;
			
		}
		input.form-control:focus, button.btn:focus{
		    border-color: none;
            box-shadow: 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 4px rgba(126, 239, 104, 0.6);
            outline: 0 none;
		}
		#shrtdiv{
		    
		}
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="../removebanner.js"></script>
</head>

<body>
    <div class="container h-100">
    	<div id="main" class="row align-items-center h-100">
    	    <div class="col-10 m-auto">
    	        
        		<div class="input-group mb-3" id="shrtdiv">
                  <input type="text" class="form-control form-control-lg" placeholder="long url" id="urlin">
                  <div class="input-group-append">
                    <button class="btn btn-lg btn-primary px-5" onclick="sort(this)">short</button>
                  </div>
                </div>
                
                <div class="mt-3">
                    <div class="col-10 mx-auto p-3 animated bounceInLeft" id="op">
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
	</div>
	<script>
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
	               //return console.log(result);
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
	</script>
</body>
</html>
