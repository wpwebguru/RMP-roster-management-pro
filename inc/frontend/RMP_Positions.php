<?php  ?>
			
			<div class="rmp-search-filter">
				<table class="rmp-table">
					<tbody>
						<tr>
							<th>Entity</th>
							<td>
								<select class="rmp-from-select"> 
									<option value=""></option>
								</select>
							</td>
						</tr>
						
						<tr>
							<th>Interval</th>
							<td>
								<select class="rmp-ending-select"> </select>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			
			
			<div class="rmp-main-content">
				
				<table>
					<thead>
							<tr>
								<th>Positions</th>
							<!--	<th>Code</th> -->
								<th>Action</th>
							</tr>
					</thead>
					
					<tbody id="rmp-post-loop">
						<?php
					
						 global $wpdb;
						$data_view = "SELECT * FROM rmp_roster_management";
						$results = $wpdb->get_results($data_view);
						
						$counter = 0; // It's dynamically add a seriel number
						
							// For loop functions
							foreach( $results as $result ) {
								$id = $result->id;
								$leader = $result->leader_position;
								$start = $result->start_year;
								$end = $result->end_year;
								$region = $result->region;
								$section = $result->section;
								
								// image display
								//$url = wp_get_attachment_url( $code );
								
								?>
								<tr class="rmp-data-tr">
									<form action="" method="post" id="post">
										  <td class="rmp-positions">
											<input type="text" name="up_positions" value="<?php echo $leader;?>" >
										  </td>
										  
									<!--	  <td class="rmp-code"><input type="text" name="up_code" value="<?php // echo $code;?>" ></td>  -->
										 
										  <input type="hidden" name="upid" value="<?php echo $id;?>">
									
										<!--  Image display
										<td><img id='image-preview' src='<?php // echo $url; ?>' width='60' height='60'></td>
										  -->
										  
										  <td class="rmp-update" width="160">
											<input type="submit" name="P_update" value="Update">
											<input type="submit" name="P_delete" value="Delete">
										  </td>
										  <td class="rmp-leader rmp-leader-filter" style="display: none;"><?php echo $leader;?></td>
										  <td class="rmp-ending-filter" style="display: none;"><?php echo $start. '-'. $end;?></td>
										  
									</form>
								</tr>
								
						<?php 
								} 
								
					// update data
					if(isset($_POST['P_update'])){
							
						global $wpdb;
						
						$id = stripslashes_deep($_POST['upid']); 
						$upPositions = stripslashes_deep($_POST['up_positions']);
						//$upCode = stripslashes_deep($_POST['up_code']);

						$query = $wpdb->update('rmp_roster_management', array('id'=>$id, 'leader_position'=>$upPositions, /*'code'=>$upCode */ ), array('id'=>$id));
						
						if ( $query ) {
							wp_redirect( $_SERVER['HTTP_REFERER'] );
							exit;
						}
					}
					
					// delete data
					if(isset($_POST['P_delete'])){
						
						global $wpdb;
						$id = $_POST['upid'];
						$query = $wpdb->delete( 'rmp_roster_management', array( 'id' => $id ) );
						
						// redirect function
						if ( $query ) {
							wp_redirect( $_SERVER['HTTP_REFERER'] );
							exit;
						}
					}
								
						?>
					</tbody>
					<tr>
						<form action="" method="POST">
							<td><input type="text" name="insertPositions" placeholder="Add a new position"></td>
							
							<input type="hidden" name="insertRegion" value="Region 9">
							<td width="160"><input type="submit" name="position_insert" value="Add New" style="width: 100%;"></td>
						</form>	
					</tr>
				</table>
			</div>
		
<?php


// Form submition 
		if(isset($_POST['position_insert'])){
			
			$insertPositions = $_POST['insertPositions'];
			$insertRegion = $_POST['insertRegion'];
		//	$insertSection = $_POST['insertSection'];
			
			global $wpdb;
			
			$query = $wpdb->insert('rmp_roster_management', array(
							'region'=>$insertRegion,
							'leader_position'=>$insertPositions,
					) );
					
					
			if ( $query ) {
					wp_redirect( $_SERVER['HTTP_REFERER'] );
					exit;
				}
		}
		
		




























