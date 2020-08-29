<style>
	.empty-msg {
		border-radius: .3rem;
	    background: #d2d6de;
	    border: 1px solid #d2d6de;
	    color: #444;
	    padding: 5px 10px;
	}

	.direct-chat-text {
		white-space: pre-wrap;
	}

	textarea {
		resize: none;
	}
</style>

<section class="content mt-2" style="padding-bottom: 100px;">
	<div class="row">
	  	<div class="col-lg">
	    	<!-- DIRECT CHAT -->
	    	<div class="card direct-chat direct-chat-success">
	      		<div class="card-body">
	        		<!-- Conversations are loaded here -->
	        		<div id="chat-box" class="direct-chat-messages" style="max-height: 473px !important; min-height: 473px !important; overflow-x: auto;">

        				<?php if (empty($chats)): ?>
    					  	<div class="empty-msg text-center">No Message Found</div>
        				<?php endif ?>

	        			<?php foreach ($chats as $chat): ?>
	        				<?php if ($chat->user_id !== $this->fungsi->user_login()->user_id): ?>
	        					<div class="direct-chat-msg">
	        					  	<div class="direct-chat-infos clearfix">
	        					    	<span class="direct-chat-name float-left"><?= get_chat_user($chat->user_id)->username; ?></span>
	        					    	<span class="direct-chat-timestamp float-right"><?= $chat->created_at; ?></span>
	        					  	</div>
	        					  	<img class="direct-chat-img" src="<?= base_url('assets/img/profile/' . get_chat_user($chat->user_id)->image); ?>">
	        					  	<div class="direct-chat-text"><?= $chat->message; ?></div>
	        					</div>
	        				<?php else: ?>
	        					<div class="direct-chat-msg right">
	        					  	<div class="direct-chat-infos clearfix">
	        					    	<span class="direct-chat-name float-right"><?= get_chat_user($chat->user_id)->username; ?></span>
	        					    	<span class="direct-chat-timestamp float-left"><?= $chat->created_at; ?></span>
	        					  	</div>
	        					  	<img class="direct-chat-img" src="<?= base_url('assets/img/profile/' . get_chat_user($chat->user_id)->image); ?>">
	        					  	<div class="direct-chat-text"><?= $chat->message; ?></div>
	        					</div>
	        				<?php endif ?>
	        			<?php endforeach; ?>
	        		</div>
	        		<!--/.direct-chat-messages-->
	        	</div>
	        	<!-- /.direct-chat-pane -->
	      	</div>
	      	<!-- /.card-body -->
	      	<div class="card-footer">
	          	<div class="input-group">
	            	<textarea id="message" rows="1" placeholder="Type Message ..." class="form-control" autofocus></textarea>
            		<span class="input-group-append">
              			<button type="submit" class="btn btn-primary" id="send">
              				<i class="fas fa-fw fa-paper-plane"></i> 
              				Send
              			</button>
            		</span>
	          	</div>
	      	</div>
	      	<!-- /.card-footer-->
	    </div>
	    <!--/.direct-chat -->
	  </div>
	  <!-- /.col -->

	  <!-- Scripts -->
	  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
	  <script>

		var chatScrollHeight = document.getElementById('chat-box').scrollHeight;

	  	setTimeout(function() {
	  		$('#chat-box').scrollTop(chatScrollHeight);
	  	});

	  	function sendAjax() {
	  		var value = {
  				message: $('#message').val()
	  		}

	  		$.ajax({
	  			url: '<?= base_url("chat/add"); ?>',
	  			type: 'POST',
	  			data: value,
	  			success: function(data) {
  					console.log(data);
	  				if (data == 2) {
	  					$('#chat-box').html(`
	  						<div class="empty-msg text-center">No Message Found</div>
	  					`);
	  				}
	  			}
	  		});
	  	}

	  	$('#message').on('keydown', function(e) {
	  		if (e.keyCode == 13 && e.ctrlKey == true && $('#message').val().trim() !== '') {
		  		e.preventDefault();
		  		sendAjax();
	  		}
	  	});

	  	$('#send').on('click', function() {
	  		sendAjax();
	  	});

  	    var pusher = new Pusher('de659bd2b7a7062bf5b0', {
  	      cluster: 'ap1',
  	      useTLS: true
  	    });

  	    var channel = pusher.subscribe('pos-chat');
  	    channel.bind('send-message', function(data) {
  	      addData(data);
  	    });

  	    function addData(data) {
  	    	var html = '';
  	    	for(var i in data) {
  	    		if (data[i].user_id !== "<?= $id; ?>") {
  	    			html += `<div class="direct-chat-msg">
							  	<div class="direct-chat-infos clearfix">
							    	<span class="direct-chat-name float-left">${data[i].username}</span>
							    	<span class="direct-chat-timestamp float-right">${data[i].created_at}</span>
							  	</div>
							  	<img class="direct-chat-img" src="<?= base_url(); ?>assets/img/profile/${data[i].image}">
							  	<div class="direct-chat-text">${data[i].message}</div>
							</div>`;
  	    		} else {
  	    			html += `<div class="direct-chat-msg right">
							  	<div class="direct-chat-infos clearfix">
							    	<span class="direct-chat-name float-right">${data[i].username}</span>
							    	<span class="direct-chat-timestamp float-left">${data[i].created_at}</span>
							  	</div>
							  	<img class="direct-chat-img" src="<?= base_url(); ?>assets/img/profile/${data[i].image}">
							  	<div class="direct-chat-text">${data[i].message}</div>
							</div>`;
  	    		}
  	    	}
  	    	$('#message').val('');
  	    	$('#message').focus();
  	    	$('#chat-box').html(html);
  	    	
    		chatScrollHeight = document.getElementById('chat-box').scrollHeight;

    	  	setTimeout(function() {
    	  		$('#chat-box').scrollTop(chatScrollHeight);
    	  	});
  	    }

	  </script>
	  <!-- /.Scripts -->
</section>
