

		<div class="container p-t-md">
		  <div class="row">
		    <div class="col-md-2">

		    </div>
		    <div class="col-md-8">
		      <div class="media list-group-item p-a">

						<div>
							<?php if(isset($_SESSION['isLoggedIn'])): ?>
							<p class="btn-share"><a class="btn btn-success " href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>  </p>
						<?php endif;?>
							<?php foreach($viewModel as $item) : ?>
								<div class="well">
									<h3><?php echo $item['title']; ?></h3>
									<small><?php echo $item['postdate']; ?></small>
									<hr />
									<p><?php echo $item['body']; ?></p>
									<br />
									<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
								</div>
							<?php endforeach; ?>
						</div>
						   </div>
							    </div>

		    <div class="col-md-2">

		    </div>
				   </div>
		</div>
