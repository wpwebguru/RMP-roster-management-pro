<?php
	add_shortcode( 'RMP_Management', 'RMP_Frontend_Management_func' );
	function RMP_Frontend_Management_func(){ ?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel with-nav-tabs panel-primary">
					<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tabRoster" data-toggle="tab">Roster</a></li>
								<li><a href="#tabEntities" data-toggle="tab">Entities</a></li>
								<li><a href="#tabPositions" data-toggle="tab">Positions</a></li>
								<li><a href="#tabIntervals" data-toggle="tab">Intervals</a></li>
							<!--	<li><a href="#addnew" data-toggle="tab">Add New</a></li> -->
								<li><a href="#tabExport" data-toggle="tab">Export</a></li>
								
							</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tabRoster"><?php include 'RMP_Roster.php';?></div>
							<div class="tab-pane fade" id="tabEntities"><?php include 'RMP_Entities.php';?></div>
							<div class="tab-pane fade" id="tabPositions"><?php include 'RMP_Positions.php';?></div>
							<div class="tab-pane fade" id="tabIntervals"><?php include 'RMP_Interval.php';?></div>
						<!--	<div class="tab-pane fade" id="addnew"><?php // include 'RMP_add_new_frontend.php';?></div> -->
							<div class="tab-pane fade" id="tabExport">Export</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	<?php }












































