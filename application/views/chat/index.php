<section class="content mt-2">
	<div class="row">
	  <div class="col-lg">
	    <!-- DIRECT CHAT -->
	    <div class="card direct-chat direct-chat-success">
          <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"data-widget="chat-pane-toggle">toogle</button>
	      <div class="card-body">
	        <!-- Conversations are loaded here -->
	        <div class="direct-chat-messages" style="max-height: 473px !important; min-height: 473px !important; overflow-x: auto;">
	        	
		        <div class="direct-chat-msg">
		          <div class="direct-chat-infos clearfix">
		            <span class="direct-chat-name float-left"><?= $row->user_name ?></span>
		            <span class="direct-chat-timestamp float-right"><?= indo_date($row->date) . " " . " " . $row->time ?></span>
		          </div>
		          <img class="direct-chat-img" src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg" alt="message user image">
		          <div class="direct-chat-text">
		            <?= $row->message ?>
		          </div>
		        </div>

	          	<div class="direct-chat-msg right">
	          	  <div class="direct-chat-infos clearfix">
	          	    <span class="direct-chat-name float-right"><?= $row->user_name ?></span>
	          	    <span class="direct-chat-timestamp float-left"><?= indo_date($row->date) . " " . " " . $row->time ?></span>
	          	  </div>
	          	  <img class="direct-chat-img" src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg" alt="message user image">
	          	  <div class="direct-chat-text">
	          	    <?= $row->message ?>
	          	  </div>
	          	</div>
	        </div>
	        <!--/.direct-chat-messages-->

	        <!-- Contacts are loaded here -->
	        <div class="direct-chat-contacts" style="max-height: 473px !important; min-height: 473px !important; overflow-x: auto;">
	          <ul class="contacts-list">
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user1-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    Count Dracula
	                    <small class="contacts-list-date float-right">2/28/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">How have you been? I was...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user7-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    Sarah Doe
	                    <small class="contacts-list-date float-right">2/23/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">I will be waiting for...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    Nadia Jolie
	                    <small class="contacts-list-date float-right">2/20/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">I'll call you back at...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user5-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    Nora S. Vans
	                    <small class="contacts-list-date float-right">2/10/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">Where is your new...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user6-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    John K.
	                    <small class="contacts-list-date float-right">1/27/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">Can I take a look at...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	            <li>
	              <a href="#">
	                <img class="contacts-list-img" src="<?= base_url() ?>assets/dist/img/user8-128x128.jpg">

	                <div class="contacts-list-info">
	                  <span class="contacts-list-name">
	                    Kenneth M.
	                    <small class="contacts-list-date float-right">1/4/2015</small>
	                  </span>
	                  <span class="contacts-list-msg">Never mind I found...</span>
	                </div>
	                <!-- /.contacts-list-info -->
	              </a>
	            </li>
	            <!-- End Contact Item -->
	          </ul>
	          <!-- /.contacts-list -->
	        </div>
	        <!-- /.direct-chat-pane -->
	      </div>
	      <!-- /.card-body -->
	      <div class="card-footer">
	        <form action="<?= site_url('chat') ?>" method="post">
	          <div class="input-group">
	            <textarea name="message" rows="1" placeholder="Type Message ..." class="form-control"></textarea>
	            <span class="input-group-append">
	              <button type="button" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Send</button>
	            </span>
	          </div>
	        </form>
	      </div>
	      <!-- /.card-footer-->
	    </div>
	    <!--/.direct-chat -->
	  </div>
	  <!-- /.col -->
	</div>
</section>
