<?php

?>
	<div id="wpbody" role="main">
		<div id="wpbody-content">
			<div class="wrap" id="poststuff">
				<h1>Roster Management Settings</h1>
				
				<form action="options.php" method="post">
					<?php wp_nonce_field('update-options'); ?>
					<div class="row">
						<div class="col-8 cs-form-box-shadw margin-right">
							<table class="table table-hover" role="presentation">
								<tbody>
									<tr>
										<th scope="row"><label for="shortcode">Shortcodes:</label></th>
										<td>
											<input name="shortcode" type="text" id="shortcode" value="[RMP_Management]" class="regular-text" readonly>
										<!--	<input name="shortcode" type="text" id="shortcode" value="[RMP_Member_List]" class="regular-text" readonly> -->
										</td>
									</tr>
									
									<tr>
										<th scope="row"><label for="shortcode">Button</label></th>
										<td><input type="color" ></td>
									</tr>
									
									
									<tr>
										<th></th>
										<td>
											<input type="hidden" name="action" value="update" />
											<input type="hidden" name="page_options" value="your_name, your_phone" />
											<input type="submit" class="button button-primary" id="submit" name="submit" value="Save Changes" />
										</td>
									</tr>
								</tbody>
							</table>
							
							
						</div>
						<!-- <div class="col-3 cs-form-box-shadw margin-left"> -->
							
						</div>
					</div>
					
					
				</form>
				
			</div>
		</div>
	</div>



































