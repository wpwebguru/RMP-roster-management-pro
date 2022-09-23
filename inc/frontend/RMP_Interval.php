<?php  ?>
			<div class="rmp-main-content">
			
				<table>
					<thead>
							<tr>
								<th>Start Year</th>
								<th>End Year</th>
								<th>Interval</th>
								<th>Action</th>
							</tr>
					</thead>
					
					<tbody id="rmp-post-loop">
						<?php
					
						 global $wpdb;
						$data_view = "SELECT * FROM rmp_roster_management";
						$results = $wpdb->get_results($data_view);
						
						$counter = 0; // It's dynamically add a seriel number
						$serial = 'up_interval'. ++$counter;
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
								<tr class="rmp-data-tr">
									<form action="" method="post" id="post">
										  <td class="rmp-start"><input id="up_start" type="number" name="up_start" value="<?php echo $start;?>" maxlength="4"></td>
										  
										  <td class="rmp-end"><input id="up_end" type="number" name="up_end" value="<?php echo $end;?>" maxlength="4"></td>
										  
										  <td class="rmp-interval"><?php echo $start. '-'. $end;?></td>
										 
										  <td class="rmp-ending-filter" style="display: none;"><?php echo $end;?></td>
										  <input type="hidden" name="upid" value="<?php echo $id;?>">
										  
										  <td class="rmp-update" width="160">
											<input type="submit" name="IN_update" value="Update">
											<input type="submit" name="IN_delete" value="Delete">
										  </td>
										  
									</form>
								</tr>
								
						<?php 
								} 
								
					// update data
					if(isset($_POST['IN_update'])){
							
						global $wpdb;
						
						$id = stripslashes_deep($_POST['upid']); 
						$upStart = stripslashes_deep($_POST['up_start']);
						$upEnd = stripslashes_deep($_POST['up_end']);
						

						$query = $wpdb->update('rmp_roster_management', array('id'=>$id, 'start_year'=>$upStart, 'end_year'=>$upEnd), array('id'=>$id));
						
						if ( $query ) {
							wp_redirect( $_SERVER['HTTP_REFERER'] );
							exit;
						}

					}
					
					// delete data
					if(isset($_POST['IN_delete'])){
						
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
				</table>
			</div>
			
<?php































