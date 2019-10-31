<?php
	
	$q = "SELECT id,linkid,destination,JSON_LENGTH(visits),created_at FROM zlinks";

	$links = $db->query($q)->fetchAll(PDO::FETCH_ASSOC);

	// print_r($links);

	// exit;

?>
<div class="container h-100 mt-4">

		<h2 class="text-center">Your Shorted Links</h2> 

    	<table id="linkstable" class="table table-bordered table-sm table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Link id</th>
                <th>Destination</th>
                <th>Visits</th>
                <th>Create Date</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($links as $link) : ?>
            <tr>
                <td><?= $link['id'] ?></td>
                <td><?= $link['linkid'] ?></td>
                <td><?= $link['destination'] ?></td>
                <td class="text-center">
                	<?= $link['JSON_LENGTH(visits)']; ?> &nbsp;
                	<a href="#" class="btn btn-sm btn-light" onclick='showvisits("<?=$link['linkid']?>")'>👁</a>
                </td>
                <td><?= $link['created_at'] ?></td>
            </tr>
        	<?php endforeach; ?>
        </tbody>		
</div>



<script>
	
	$('#linkstable').DataTable({
		'pageLength': 10, //default number of rows per page
	});

	function showvisits(linkid)
	{
		$.ajax({
			url: 'ajax.php',
			type: 'POST',
			data: { op: 'fetchvisits', linkid: linkid },
			success:function(result){
				console.log(result);
				var t = $('#visits-table');
				t.html('');
				$.each(result,function(i,v){
					t.append(`<tr><td>${v.ip}</td><td>${v.time}</td?</tr>`);
				})
				$('#link-visits').modal('show');
			},
			error:function(response)
			{
				console.log(response);
			}
		});
		// 
	}

</script>