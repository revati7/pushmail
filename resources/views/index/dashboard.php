
<?php
	$this->section("header");
?>

<div class="container" style="margin-top: 10px;">
	<div class='row'>
		<div class="col-md-3" style='padding-right:0px;'>
			<?php 	$this->section("menuuser");?>
		</div>
		<div class="col-md-9">
			<div class="row">
			    <div class="col-md-6" style='padding-right:0px;'>
			        <div class='card'>
			        <div class="card-body">
					<h4>Apply for Courses</h4>
			        <h1><?php echo $this->courseCount;?></h1>
					</div>
			        <div class="card-footer">
			            <a href='<?php echo _PATH_;?>course/view' class='btn btn-primary'>View</a>						
					</div>
			        </div>
			    </div>
				<div class="col-md-6" style='padding-right:0px;'>
			        <div class='card'>
						<div class="card-body">
							<h4>Applied Courses</h4>
							<h1><?php echo $this->courseCount;?></h1>
						</div>
						<div class="card-footer">
							<a href='<?php echo _PATH_;?>course/viewstatus' class='btn btn-primary'>View Status</a>
							
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php
	$this->section("footer");
?>
                            
                            
                            