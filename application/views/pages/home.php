<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/socketio/socket_io_v2.js"></script>

<div id="messages"></div>


<h1> <?= $title ?> </h1>

<p>Hi! we can also output like this: <?php echo $title ?></p>


<script>
	var socket = io.connect('http://localhost:3001');

	socket.on('newOrder', function(data) {

		console.log("conntected:" + data);

		alert(data.message + " Alert: " + data.alert_id + " Company: " + data.company_id);

		//ajax call to get the alert details.
		$.ajax({
			url: "<?php echo base_url() ?>alerts/getAlertDetails",
			type: "POST",
			data: {alert_id: data.alert_id, company_id: data.company_id},
			success: function(response) {
				//console.log(response);
				$("#messages").append(response);
			}
		});

	});
</script>
