<?php

		// Data show
?>		

	<div class="custom-main-sec">
			<div class="container cs-box-shadow" id="top-entity">
				
					<span>All Users List</span>
					<span class="btn btn-outline-info add-new"><a href="<?php echo get_option( 'siteurl' );?>/wp-admin/admin.php?page=add_new_board-member">Add New</a></span>
				
			</div>
			<div class="container cs-form-box-shadw" id="all-entity">
			<table class="table">
				  <thead>
					
					<tr>
					  <th scope="col">S.L</th>
					  <th scope="col">Name</th>
					  <th scope="col">Leadership Positions</th>
					  <th scope="col">Email</th>
					  <th scope="col">Region</th>
					  <th scope="col">Interval</th>
					  <th scope="col">Action</th>
					</tr>
					
				  </thead>
				  
				  <tbody>
				  
				  
					<?php
					
						 global $wpdb;
						$data_view = "SELECT * FROM rmp_roster_management";
						$results = $wpdb->get_results($data_view);
						
						$counter = 0; // It's dynamically add a seriel number
						
							// For loop functions
							foreach( $results as $result ) {
								$id = $result->id;
								$name = $result->name;
								$email = $result->email;
								$leader = $result->leader_position;
								$region = $result->region;
								$section = $result->section;
								$branch = $result->branch;
								$group = $result->group;
								$start = $result->start_year;
								$end = $result->end_year;
								?>
								<tr class="cs-name-style">
									  <td class="serial"><?php echo ++$counter; ?></td>
									  <td class="rmp-name"><?php echo $name;?></td>
									  <td class="rmp-leader"><?php echo $leader;?></td>
									  <td class="rmp-email"><?php echo $email;?></td>
									  <td class="rmp-region"><?php echo $region;?></td>
									  <td class="rmp-interval"><?php echo $start. '-'. $end;?></td>
									
									
									<td><a href="<?php echo plugins_url( 'RMP_delete_data.php?delete=' .$id , __FILE__ );?>">Delete</a></td>
									  
								</tr>
								
						<?php 
								} 
						?>
				   
				  </tbody>
			  
			</table>
			
		</div>
		</div>
	































