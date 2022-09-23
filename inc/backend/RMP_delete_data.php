<?php

			$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$url = $_SERVER['REQUEST_URI'];
			$my_url = explode('wp-content' , $url); 
			$path = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
			include_once $path . '/wp-config.php';
			include_once $path . '/wp-includes/wp-db.php';
			include_once $path . '/wp-includes/pluggable.php';
			
			global $wpdb;
			$id = $_REQUEST['delete'];
			$query = $wpdb->delete( 'rmp_roster_management', array( 'id' => $id ) );
			
			// redirect function
			if ( $query ) {
				wp_redirect( $_SERVER['HTTP_REFERER'] );
				exit;
			}