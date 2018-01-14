<?php
/* wppa-export.php
* Package: wp-photo-album-plus
*
* Contains all the export functions
* Version 6.6.18
*
*/

function _wppa_page_export() {
global $wpdb;

	// Export Photos admin page

	// Do the export if requested
	if (isset($_POST['wppa-export-submit'])) {
		check_admin_referer( '$wppa_nonce', WPPA_NONCE );
		wppa_export_photos();
	} ?>
	<div class="wrap">
		<?php $iconurl = WPPA_URL.'/img/album32.png'; ?>
		<div id="icon-camera" class="icon32" style="background: transparent url(<?php echo($iconurl); ?>) no-repeat">
		</div>
		<?php $iconurl = WPPA_URL.'/img/arrow32.png'; ?>
		<div id="icon-arrow" class="icon32" style="background: transparent url(<?php echo($iconurl); ?>) no-repeat">
		</div>
		<?php $iconurl = WPPA_URL.'/img/disk32.png'; ?>
		<div id="icon-disk" class="icon32" style="background: transparent url(<?php echo($iconurl); ?>) no-repeat">
			<br />
		</div>

		<h2><?php _e('Export Photos', 'wp-photo-album-plus'); ?></h2><br />

		<form action="<?php echo(wppa_dbg_url(get_admin_url().'admin.php?page=wppa_export_photos')) ?>" method="post">
			<?php wp_nonce_field('$wppa_nonce', WPPA_NONCE); ?>
			<?php echo(sprintf(__('Photos will be exported to: <b>%s</b>.', 'wp-photo-album-plus'), WPPA_DEPOT)) ?>
			<h2><?php _e('Export photos from album <span style="font-size:12px;">(Including Album information)</span>:', 'wp-photo-album-plus'); ?></h2>
			<?php $albums = $wpdb->get_results( "SELECT * FROM `" . WPPA_ALBUMS . "` " . wppa_get_album_order(), ARRAY_A);
			$high = '0'; ?>

			<table class="form-table albumtable">
				<thead>
				</thead>
				<tbody>
				<tr>
					<?php $ct = 0;
					foreach($albums as $album) {
						$line = '&nbsp;'.$album['id'].':&nbsp;'.__(stripslashes($album['name']));
						if ($album['id'] > $high) $high = $album['id']; ?>
						<td>
							<input type="checkbox" name="album-<?php echo($album['id']) ?>" />&nbsp;<?php echo($line) ?>
						</td>
						<?php if ($ct == 4) {	// Wrap to newline
							echo('</tr><tr>');
							$ct = 0;
						}
						else {
							$ct++;
						}
					} ?>
				</tr>
				</tbody>
			</table>
			<input type="hidden" name="high" value="<?php echo($high) ?>" />
			<p>
				<input type="submit" class="button-primary" name="wppa-export-submit" value="<?php _e('Export', 'wp-photo-album-plus'); ?>" />
			</p>
		</form>
	</div>
<?php
}

function wppa_export_photos() {
global $wpdb;
global $wppa_zip;
global $wppa_temp;
global $wppa_temp_idx;

	$wppa_temp_idx = 0;

	_e('Exporting...<br/>', 'wp-photo-album-plus');
	if ( PHP_VERSION_ID >= 50207 && class_exists('ZipArchive') ) {
		echo('Opening zip output file...');
		$wppa_zip = new ZipArchive;
		$zipid = get_option('wppa_last_zip', '0');
		$zipid++;
		update_option('wppa_last_zip', $zipid);
		$zipfile = WPPA_DEPOT_PATH.'/wppa-'.$zipid.'.zip';
		if ($wppa_zip->open($zipfile, 1) === TRUE) {
			_e('ok, <br/>Filling', 'wp-photo-album-plus'); echo(' '.basename($zipfile));
		} else {
			_e('failed<br/>', 'wp-photo-album-plus');
			$wppa_zip = false;
		}
	}
	else {
		$wppa_zip = false;
		if ( PHP_VERSION_ID < 50207 ) wppa_warning_message(__('Can export albums and photos, but cannot make a zipfile. Your php version is < 5.2.7.', 'wp-photo-album-plus'));
		if ( ! class_exists('ZipArchive') ) wppa_warning_message(__('Can export albums and photos, but cannot make a zipfile. Your php version does not support ZipArchive.', 'wp-photo-album-plus'));
	}

	if (isset($_POST['high'])) $high = $_POST['high']; else $high = 0;

	if ($high) {
		$id = 0;
		$cnt = 0;
		while ($id <= $high) {
			if (isset($_POST['album-'.$id])) {
				_e('<br/>Processing album', 'wp-photo-album-plus'); echo(' '.$id.'....');
				wppa_write_album_file_by_id($id);
				$photos = $wpdb->get_results($wpdb->prepare( 'SELECT * FROM ' . WPPA_PHOTOS . ' WHERE album = %s', $id), 'ARRAY_A' );
				$cnt = 0;
				foreach ( $photos as $photo ) {

					// Copy the photo
					$from = wppa_get_photo_path( $photo['id'] );
					$to = WPPA_DEPOT_PATH.'/'.$photo['id'].'.'.$photo['ext'];

					if ( $wppa_zip ) {
						$wppa_zip->addFile ( $from, basename ( $to ) );
					}
					else copy ( $from, $to );

					// Create the metadata
					if ( ! wppa_write_photo_file ( $photo ) ) {
						return false;
					}
					else $cnt++;
				}
				_e('done.', 'wp-photo-album-plus'); echo(' '.$cnt.' '); _e('photos processed.', 'wp-photo-album-plus');
			}
			$id++;
		}
		_e('<br/>Done export albums.', 'wp-photo-album-plus');
	}
	else {
		_e('Nothing to export', 'wp-photo-album-plus');
	}

	if ($wppa_zip) {
		_e('<br/>Closing zip.', 'wp-photo-album-plus');
		_e('<br/>Deleting temp files.', 'wp-photo-album-plus');
		$wppa_zip->close();
		// Now the zip is closed we can destroy all tempfiles we created here
		if (is_array($wppa_temp)) {
			foreach ($wppa_temp as $file) {
				unlink($file);
			}
		}
	}
	_e('<br/>Done!', 'wp-photo-album-plus');
}

function wppa_write_album_file_by_id($id) {
global $wpdb;
global $wppa_zip;
global $wppa_temp;
global $wppa_temp_idx;
	$album = $wpdb->get_row($wpdb->prepare( 'SELECT * FROM '.WPPA_ALBUMS.' WHERE id = %s LIMIT 0,1', $id ), 'ARRAY_A');
	if ($album) {
		$fname = WPPA_DEPOT_PATH.'/'.$id.'.amf';
		$file = fopen($fname, 'wb');
		$err = false;
		if ($file) {
			if (fwrite($file, "name=".$album['name']."\n") !== FALSE) {
				if (fwrite($file, "desc=".wppa_nl_to_txt($album['description'])."\n") !== FALSE) {
					if (fwrite($file, "aord=".$album['a_order']."\n") !== FALSE) {
						if (fwrite($file, "prnt=".wppa_get_album_name( $album['a_parent'], array( 'raw' => true ) ) . "\n") !== FALSE) {
							if (fwrite($file, "pord=".$album['p_order_by']."\n") !== FALSE) {
								if (fwrite($file, "ownr=".$album['owner']."\n") !== FALSE) {

/*
					main_photo bigint(20) NOT NULL,
					cover_linktype tinytext NOT NULL,
					cover_linkpage bigint(20) NOT NULL,
					timestamp tinytext NOT NULL,
					upload_limit tinytext NOT NULL,
					alt_thumbsize tinytext NOT NULL,
					default_tags tinytext NOT NULL,
					cover_type tinytext NOT NULL,
					suba_order_by tinytext NOT NULL,
*/

								}
								else $err = true;
							}
							else $err = true;
						}
						else $err = true;
					}
					else $err = true;
				}
				else $err = true;
			}
			else $err = true;
			if ($err) {
				wppa_error_message(sprintf(__('Cannot write to file %s.', 'wp-photo-album-plus'),$fname));
				fclose($file);
				return false;
			}
			else {
				fclose($file);
				if ( $wppa_zip ) {
					$wppa_zip->addFile($fname, basename($fname));
				}
				$wppa_temp[$wppa_temp_idx] = $fname;
				$wppa_temp_idx++;
			}
		}
		else {
			wppa_error_message(__('Could not open album output file.', 'wp-photo-album-plus'));
			return false;
		}
	}
	else {
		wppa_error_message(__('Could not read album data.', 'wp-photo-album-plus'));
		return false;
	}
	return true;
}

function wppa_write_photo_file($photo)	{
global $wppa_zip;
global $wppa_temp;
global $wppa_temp_idx;
	if ($photo) {
		$fname = WPPA_DEPOT_PATH.'/'.$photo['id'].'.pmf';
		$file = fopen($fname, 'wb');
		$err = false;
		if ($file) {
			if (fwrite($file, "name=".$photo['name']."\n") !== FALSE) {
				if (fwrite($file, "desc=".wppa_nl_to_txt($photo['description'])."\n") !== FALSE) {
					if (fwrite($file, "pord=".$photo['p_order']."\n") !== FALSE) {
						if (fwrite($file, "albm=".wppa_get_album_name($photo['album'], array( 'raw' => true ) )."\n") !== FALSE) {
							if (fwrite($file, "lnku=".$photo['linkurl']."\n") !== FALSE) {
								if (fwrite($file, "lnkt=".$photo['linktitle']."\n") !== FALSE) {

/*
					ext tinytext NOT NULL,
					mean_rating tinytext NOT NULL,
					linktarget tinytext NOT NULL,
					owner text NOT NULL,
					timestamp tinytext NOT NULL,
					status tinytext NOT NULL,
					rating_count bigint(20) NOT NULL default '0',
					tags tinytext NOT NULL,
					alt tinytext NOT NULL,
					filename tinytext NOT NULL,
					modified tinytext NOT NULL,
					location tinytext NOT NULL,
*/

								}
								else $err = true;
							}
							else $err = true;
						}
						else $err = true;
					}
					else $err = true;
				}
				else $err = true;
			}
			else $err = true;
			if ($err) {
				wppa_error_message(sprintf(__('Cannot write to file %s.', 'wp-photo-album-plus'),$fname));
				fclose($file);
				return false;
			}
			else {
				fclose($file);
				if ($wppa_zip) {
					$wppa_zip->addFile($fname, basename($fname));
				}
				$wppa_temp[$wppa_temp_idx] = $fname;
				$wppa_temp_idx++;
			}
		}
		else {
			wppa_error_message(__('Could not open photo output file.', 'wp-photo-album-plus'));
			return false;
		}
	}
	else {
		wppa_error_message(__('Could not read photo data.', 'wp-photo-album-plus'));
		return false;
	}
	return true;
}