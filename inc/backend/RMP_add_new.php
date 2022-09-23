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
						<h5 class="form-label">Choose Your Image</h5>
					  </div>
					  
					  <div class="col-md-12">
						
						<div class='image-preview-wrapper'>
							<img id='image-preview' src='' width='60'>
						</div>
						<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
						<input type='hidden' name='image_attachment_id' id='image_attachment_id' value=''>
						
					  </div>
					  
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
						<input type="text" class="form-control" id="rmp_region" name="rmp_region" value="Region 9" readonly />
					  </div>
					
					  
					  <div class="col-md-6">
						<label for="rmp_section" class="form-label">Section</label>
						<input type="text" class="form-control" id="rmp_section" name="rmp_section" placeholder="Section" />
					  </div>
					 
					  
					  <div class="col-md-6">
						<label for="rmp_branch" class="form-label">Branch</label>
						<input type="text" class="form-control" id="rmp_branch" name="rmp_branch" placeholder="Branch"  /> 
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
		if(isset($_POST['submit']) && isset( $_POST['image_attachment_id'] )){
			
			$name = $_POST['rmp_name'];
			$email = $_POST['rmp_email'];
			$leader = $_POST['rmp_leader_position'];
			
			$region = $_POST['rmp_region'];
			$section = $_POST['rmp_section'];
			$branch = $_POST['rmp_branch'];
			$group = $_POST['rmp_group'];
			
			$start = $_POST['rmp_start_year'];
			$end = $_POST['rmp_end_year'];
			
			
			$imgs = $_POST['image_attachment_id'];
			
		//	update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
			
			
		global $wpdb;
		
		$query = $wpdb->insert('rmp_roster_management', array(
						'name'=>$name,
						'email'=>$email,
						'leader_position'=>$leader,
						
						'region'=>$region,
						'section'=>$section,
						'branch'=>$branch,
						'group'=>$group,
						
						'img_id'=>$imgs,
						
						'start_year'=>$start,
						'end_year'=>$end,
				) );
				
				
		if ( $query ) {
				wp_redirect( $_SERVER['HTTP_REFERER'] );
				exit;
			}
		}
		
		
			wp_enqueue_media();



?>
<?php
$my_saved_attachment_post_id = get_option( 'media_selector_attachment_id', 0 );
    ?><script type='text/javascript'>
        jQuery( document ).ready( function( $ ) {
            // Uploading files
            var file_frame;
            var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
            var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
            jQuery('#upload_image_button').on('click', function( event ){
                event.preventDefault();
                // If the media frame already exists, reopen it.
                if ( file_frame ) {
                    // Set the post ID to what we want
                    file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                    // Open frame
                    file_frame.open();
                    return;
                } else {
                    // Set the wp.media post id so the uploader grabs the ID we want when initialised
                    wp.media.model.settings.post.id = set_to_post_id;
                }
                // Create the media frame.
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select a image to upload',
                    button: {
                        text: 'Use this image',
                    },
                    multiple: false // Set to true to allow multiple files to be selected
                });
                // When an image is selected, run a callback.
                file_frame.on( 'select', function() {
                    // We set multiple to false so only get one image from the uploader
                    attachment = file_frame.state().get('selection').first().toJSON();
                    // Do something with attachment.id and/or attachment.url here
                    $( '#image-preview' ).attr( 'src', attachment.url ).css( 'width', '60' );
                    $( '#image_attachment_id' ).val( attachment.id );
                    // Restore the main post ID
                    wp.media.model.settings.post.id = wp_media_post_id;
                });
                    // Finally, open the modal
                    file_frame.open();
            });
            // Restore the main ID when the add media button is pressed
            jQuery( 'a.add_media' ).on( 'click', function() {
                wp.media.model.settings.post.id = wp_media_post_id;
            });
        });
    </script>

































