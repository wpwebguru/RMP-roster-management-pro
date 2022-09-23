<?php  ?>
			<div class="rmp-main-content">
			
				<table>
					<thead>
							<tr>
								<th>Region</th>
								<th>Section</th>
								<th>Branch</th>
								<th>Group</th>
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
										  <td class="rmp-region" width="130"><?php echo $region;?></td>
										  <td class="rmp-section" width="255"><input type="text" name="up_section" value="<?php echo $section;?>" ></td>
										  <td class="rmp-branch" width="330"><input type="text" name="up_branch" value="<?php echo $branch;?>" ></td>
										  <td class="rmp-group"><input type="text" name="up_group" value="<?php echo $group;?>" ></td>
										 
										  <td class="rmp-ending-filter" style="display: none;"><?php echo $end;?></td>
										  <input type="hidden" name="upid" value="<?php echo $id;?>">
										  
										  <td class="rmp-update" width="160">
											<input type="submit" name="updates" value="Update" class="update">
											<input type="submit" name="deletes" value="Delete" class="delete">
										  </td>
									</form>
								</tr>
								
						<?php 
								} 
								
					// update data
					if(isset($_POST['updates'])){
							
						global $wpdb;
						
						$id = stripslashes_deep($_POST['upid']); 
						$upSection = stripslashes_deep($_POST['up_section']);
						$upBranch = stripslashes_deep($_POST['up_branch']);
						$upGroup = stripslashes_deep($_POST['up_group']);

						$query = $wpdb->update('rmp_roster_management', array('id'=>$id, 'section'=>$upSection, 'branch'=>$upBranch, 'group'=>$upGroup), array('id'=>$id));
						
						if ( $query ) {
							wp_redirect( $_SERVER['HTTP_REFERER'] );
							exit;
						}
					}
					
					// delete data
					if(isset($_POST['deletes'])){
						
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
						<tr>
							<form action="" method="POST">
								<td><input type="text" name="add_region" value="Region 9" readonly style="border: none;background: #ffffff00; outline: none; padding-left: 0px;margin-left: -5px"/></td>
								
								<td>
									<select name="choose_section" id="choose_section">
										<option value="" style="text-align: center;">-- Choose one --</option>
										<option value="Los Angeles Section (1913)">Los Angeles Section (1913)</option>
										<option value="Sacramento Section (1922)">Sacramento Section (1922)</option>
										<option value="San Diego Section (1915)">San Diego Section (1915)</option>
										<option value="San Francisco Section (1905)">San Francisco Section (1905)</option>
									</select>
								</td>
								
								<td>
									<select name="choose_branch" id="choose_branch">
										<option value="" style="text-align: center;">-- Choose one --</option>
									</select>
								</td>
								<td><input type="text" name="add_group" placeholder="" /></td>
								<td><input type="submit" class="insert_entities" name="insert_entities" value="Add New" style="width: 100%;"/></td>
							</form>	
						</tr>
					</tbody>
				</table>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script>
				$(document).ready(function () {
					$("#choose_section").change(function () {
						var val = $(this).val();
						if (val == "Los Angeles Section (1913)") {
							$("#choose_branch").html("<option value='Desert Area Branch (1953)(inactive)'>Desert Area Branch (1953)(inactive)</option><option value='Metropolitan Los Angeles Branch (1997)'>Metropolitan Los Angeles Branch (1997)</option><option value='Orange County Branch (1953)'>Orange County Branch (1953)</option><option value='San Bernardino-Riverside Branch (1953)'>San Bernardino-Riverside Branch (1953)</option><option value='San Luis Obispo Branch (1960)'>San Luis Obispo Branch (1960)</option><option value='Santa Barbara-Ventura Branch (1953)'>Santa Barbara-Ventura Branch (1953)</option><option value='Southern San Joaquin Branch (1970)'>Southern San Joaquin Branch (1970)</option>");
						} else if (val == "Sacramento Section (1922)") {
							$("#choose_branch").html("<option value='Capital Branch (1997)'>Capital Branch (1997)</option><option value='Central Valley Branch (1953)'>Central Valley Branch (1953)</option><option value='Feather River Branch (1953)'>Feather River Branch (1953)</option><option value='Shasta Branch (1951)'>Shasta Branch (1951)</option>");
						} else if (val == "San Diego Section (1915)") {
							$("#choose_branch").html("<option value='Imperial Valley Branch (1995)(inactive)'>Imperial Valley Branch (1995)(inactive)</option>");
						} else if (val == "San Francisco Section (1905)") {
							$("#choose_branch").html("<option value='Fresno Branch (1959)'>Fresno Branch (1959)</option><option value='Golden Gate Branch (1971)'>Golden Gate Branch (1971)</option><option value='North Coast Branch (1966)'>North Coast Branch (1966)</option><option value='Redwood Empire Branch (1958)'>Redwood Empire Branch (1958)</option><option value='San Jose Branch (1956)'>San Jose Branch (1956)</option>");
						} 
					});
				});
							</script>
<?php


					// Add data
					if(isset($_POST['insert_entities'])){
						
						$addRegion = $_POST['add_region'];
						$chooseSection = $_POST['choose_section'];
						$chooseBranch = $_POST['choose_branch'];
						$addGroup = $_POST['add_group'];
						
						global $wpdb;
						
						$query = $wpdb->insert('rmp_roster_management', array(
										'region'=>$addRegion,
										'section'=>$chooseSection,
										'branch'=>$chooseBranch,
										'group'=>$addGroup,
								) );
								
								
						if ( $query ) {
								wp_redirect( $_SERVER['HTTP_REFERER'] );
								exit;
							}
					}




























