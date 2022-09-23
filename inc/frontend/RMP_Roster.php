<?php  ?>
			<div class="rmp-search-filter">
				<table class="rmp-table">
					<tbody>
						<tr>
							<th>Entity</th>
							<td>
								<select class="rmp-from-select"> 
									<option value="">  </option>
								</select>
							</td>
						</tr>
						
						<tr>
							<th>Interval</th>
							<td>
								<select class="rmp-ending-select"></select>
							</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			
			<div class="rmp-main-content">
			
				<table>
					<thead>
							<tr>
								<th>Leadership Position</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
					</thead>
					
					<tbody id="rmp-post-loop">
						<?php
					
						 global $wpdb;
						$data_view = "SELECT * FROM rmp_roster_management";
						$results = $wpdb->get_results($data_view);
						
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
								<tr class="rmp-data-tr rmp-data-tr-interval">
									<form action="" method="post" id="post">
										  <td class="rmp-leader rmp-leader-filter"><?php echo $leader;?></td>
										  <td class="rmp-name"><input type="text" name="up_name" value="<?php echo $name;?>" ></td>
										  <td class="rmp-email"><input type="text" name="up_email" value="<?php echo $email;?>" ></td>
										 
										  <td class="rmp-ending-filter" style="display: none;"><?php echo $start. '-'. $end;?></td>
										  <input type="hidden" name="upid" value="<?php echo $id;?>">
										  
										  <td class="rmp-update" width="160">
											<input type="submit" name="update" value="Update">
											<input type="submit" name="delete" value="Delete">
										  </td>
									</form>
								</tr>
								
						<?php 
								} 
								
					// update data
					if(isset($_POST['update'])){
							
						global $wpdb;
						
						$id = stripslashes_deep($_POST['upid']); 
						$upName = stripslashes_deep($_POST['up_name']);
						$upEmail = stripslashes_deep($_POST['up_email']);

						$query = $wpdb->update('rmp_roster_management', array('id'=>$id, 'name'=>$upName, 'email'=>$upEmail), array('id'=>$id));
						
						if ( $query ) {
							wp_redirect( $_SERVER['HTTP_REFERER'] );
							exit;
						}

					}
					
					// delete data
					if(isset($_POST['delete'])){
						
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
			
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
			<script>
				$(document).ready(function(){
				  // Leadership Position filter
				   $("#rmp-post-loop tr").each( function(tri){
  
						let tr = $(this);
						let firstTd = tr.find(".rmp-leader-filter");
						let tdText = firstTd.text();
						let tdTextLower = tdText.toLowerCase();
						$(".rmp-from-select").append("<option value='" + tdTextLower + "'>" + tdText + "</option>");
					   
					  });
					  
					  $(".rmp-from-select option").each(function() {
						$(this).siblings('[value="'+ this.value +'"]').remove();
					  });
					  
					  $(".rmp-from-select").on("change", function() {
						var value = $(this).val().toLowerCase();
						$("#rmp-post-loop tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					  
					  // Interval filter. 
					   $(".rmp-data-tr-interval").each( function(tri){
  
						let tr = $(this);
						let firstTd = tr.find(".rmp-ending-filter");
						let tdText = firstTd.text();
						let tdTextLower = tdText.toLowerCase();
						$(".rmp-ending-select").append("<option value='" + tdTextLower + "'>" + tdText + "</option>");
					   
					  });		  
					  
					  
					  $("#mySelect option").each(function () {
						  $(this).siblings('[value="' + this.value + '"]').remove();
						});

						$(".rmp-ending-select").append(
						  $(".rmp-ending-select option")
							.remove()
							.sort(function (a, b) {
							  var at = $(a).text(),
								bt = $(b).text();
							  return at > bt ? 1 : at < bt ? -1 : 0;
							})
						);

						$(".rmp-ending-select").prepend('<option value=""> </option>');

						$(".rmp-ending-select").val($(".rmp-ending-select option:first").val());
					  
					  $(".rmp-ending-select option").each(function() {
						$(this).siblings('[value="'+ this.value +'"]').remove();
					  });
					  
					  
					  $(".rmp-ending-select").on("change", function() {
						var value = $(this).val().toLowerCase();
						$("#rmp-post-loop tr").filter(function() {
						  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					  });
					  
				});
				
				</script>

<?php































