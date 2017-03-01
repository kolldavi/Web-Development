

	<div class="container p-t-md">
	  <div class="row">
	    <div class="col-md-3">

	    </div>
	    <div class="col-md-6">
	      <div class="media list-group-item p-a">

			 	 <div>
					 <h1 class="text-center">All Shares </h1>
			 	 	<?php foreach($viewModel as $item) : ?>
			 	 		<div class="well">
							<a href="<?php echo  ROOT_PATH."users/publicprofile?userid=".$item['id']."&username=".$item['name'];?>"><strong><?php echo $item['name']; ?></strong></a>
			 	 			<h3><?php echo $item['title']; ?></h3>
			 	 			<small><?php echo $item['postdate']; ?></small>
			 	 			<hr />
			 	 			<p><?php echo $item['shares.body']; ?></p>
			 	 			<br />
			 	 			<a class="btn btn-default" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
			 	 		</div>
			 	 	<?php endforeach; ?>
			 	 </div>
 	 </div>

	      </div>

	    <div class="col-md-3">
				<?php if(isset($_SESSION['isLoggedIn'])): ?>
				<p class="btn-share"><a class="btn btn-success " href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>  </p>
			 <?php endif;?>
	    </div>
			 	 </div>
	</div>
