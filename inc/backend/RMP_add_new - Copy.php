<?php

	//Add New Data
?>


	<div class="custom-main-sec sec-dis-none" id="add-new-entity">
			<div class="container cs-box-shadow">
				
					<span>Add New Board Member</span>
					<span class="btn btn-outline-info add-new"><a href="<?php echo get_option( 'siteurl' );?>/wp-admin/admin.php?page=rmp-roster-management">View All List</a></span>
					
				
			</div>
						
			<div class="container cs-form-box-shadw">
				<form action="" method="POST" class="row g-3">
				
					  <div class="col-md-12">
						<h5 class="form-label">Roster Information</h5>
					  </div>
					  
					  <div class="col-md-6">
						<label for="rmp_name" class="form-label">Name</label>
						<input type="text" class="form-control" id="rmp_name" name="rmp_name" placeholder="Name" />
					  </div>
					
					  
					  <div class="col-md-6">
						<label for="rmp_email" class="form-label">Email</label>
						<input type="email" class="form-control" id="rmp_email" name="rmp_email" placeholder="E-mail" />
					  </div>
					 
					  
					  <div class="col-md-6">
						<label for="rmp_leader_position" class="form-label">Leadership Position</label>
						<input type="text" class="form-control" id="rmp_leader_position" name="rmp_leader_position" placeholder="Leadership Position"  /> 
					  </div>
					  
					  
					 <div class="col-md-12"><br>
						<h5 class="form-label">Entities Information</h5>
					  </div>
					  
					  
					  <div class="col-md-6">
						<label for="rmp_region" class="form-label">Region</label>
						<input type="text" class="form-control" id="rmp_region" name="rmp_region" placeholder="Region" />
					  </div>
					
					  
					  <div class="col-md-6">
						<label for="rmp_section" class="form-label">Section</label>
						<input type="text" class="form-control" id="rmp_section" name="rmp_section" placeholder="Section" />
					  </div>
					 
					  
					  <div class="col-md-6">
						<label for="rmp_branch" class="form-label">Branch</label>
						<input type="text" class="form-control" id="rmp_branch" name="rmp_branch" placeholder="Branch"  /> 
					  </div>
					  
					  
					  <div class="col-md-6">
						<label for="rmp_group" class="form-label">Group</label>
						<input type="text" class="form-control" id="rmp_group" name="rmp_group" placeholder="Group"  /> 
					  </div>
					  
					  <div class="col-md-12"><br>
						<h5 class="form-label">Positions Information</h5>
					  </div>
					  
					 
					  <div class="col-md-6">
						<label for="rmp_positions" class="form-label">Positions</label>
						<input type="text" class="form-control" id="rmp_positions" name="rmp_positions" placeholder="Positions" />
					  </div>
					
					  
					  <div class="col-md-6">
						<label for="rmp_code" class="form-label">Code</label>
						<input type="text" class="form-control" id="rmp_code" name="rmp_code" placeholder="Code" />
					  </div>
					  
					  
					  <div class="col-md-12"><br>
						<h5 class="form-label">Intervals Information</h5>
					  </div>
					  
					  
					  <div class="col-md-6">
						<label for="rmp_start_year" class="form-label">Start Year</label>
						<input type="text" class="form-control" id="rmp_start_year" name="rmp_start_year" placeholder="Start Year" maxlength="4"/>
					  </div>
					
					  
					  <div class="col-md-6">
						<label for="rmp_end_year" class="form-label">End Year</label>
						<input type="text" class="form-control" id="rmp_end_year" name="rmp_end_year" placeholder="End Year" maxlength="4"/>
					  </div>
					  
					  <div class="col-12">
						<input type="submit" name="submit" class="btn btn-primary" value="Add New">
					  </div>
				</form>
			</div>
	</div>
<?php
		// Form submition 
		if(isset($_POST['submit'])){
			
			$name = $_POST['rmp_name'];
			$email = $_POST['rmp_email'];
			$leader = $_POST['rmp_leader_position'];
			
			$region = $_POST['rmp_region'];
			$section = $_POST['rmp_section'];
			$branch = $_POST['rmp_branch'];
			$group = $_POST['rmp_group'];
			
			$start = $_POST['rmp_start_year'];
			$end = $_POST['rmp_end_year'];
			
		global $wpdb;
		
		$query = $wpdb->insert('rmp_roster_management', array(
						'name'=>$name,
						'email'=>$email,
						'leader_position'=>$leader,
						
						'region'=>$region,
						'section'=>$section,
						'branch'=>$branch,
						'group'=>$group,
						
						'start_year'=>$start,
						'end_year'=>$end,
				) );
				
				
		if ( $query ) {
				wp_redirect( $_SERVER['HTTP_REFERER'] );
				exit;
			}
		}
		
		





































