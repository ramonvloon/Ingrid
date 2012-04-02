<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e( $this->name ); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields( $this->tag.'_options' ); ?>
		<table class="form-table">
			<tr valign="top">
				
                            <th>
					<label for="<?php echo $this->tag; ?>[name]"><?php _e( 'Name' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'name', $this->options ) ) { esc_html_e( $this->options['name'] ); } ?>" id="<?php echo $this->tag; ?>[name]" name="<?php echo $this->tag; ?>[name]"/>
				</td>
                            
                            
			</tr>
			<tr valign="top">
				
                            <th>
					<label for="<?php echo $this->tag; ?>[phone]"><?php _e( 'Phone' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'phone', $this->options ) ) { esc_html_e( $this->options['phone'] ); } ?>" id="<?php echo $this->tag; ?>[phone]" name="<?php echo $this->tag; ?>[phone]"/>
				</td>
                            
			</tr>
			<tr valign="top">
				<th>
					<label for="<?php echo $this->tag; ?>[mobile]"><?php _e( 'Mobile' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'mobile', $this->options ) ) { esc_html_e( $this->options['mobile'] ); } ?>" id="<?php echo $this->tag; ?>[mobile]" name="<?php echo $this->tag; ?>[mobile]"/>
				</td>
			</tr>
			<tr valign="top">
				<th>
					<label for="<?php echo $this->tag; ?>[email]"><?php _e( 'Email' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'email', $this->options ) ) { esc_html_e( $this->options['email'] ); } ?>" id="<?php echo $this->tag; ?>[email]" name="<?php echo $this->tag; ?>[email]"/>
				</td>
			</tr>
			<tr valign="top">
				<th>
					<label for="<?php echo $this->tag; ?>[address]"><?php _e( 'Address' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'address', $this->options ) ) { esc_html_e( $this->options['address'] ); } ?>" id="<?php echo $this->tag; ?>[address]" name="<?php echo $this->tag; ?>[address]"/>
				</td>
			</tr>
                        <tr valign="top">
				<th>
					<label for="<?php echo $this->tag; ?>[woonplaats]"><?php _e( 'Woonplaats' ); ?></label>
				</th>
				<td>
					<input type="text" class="regular-text" value="<?php if ( array_key_exists( 'woonplaats', $this->options ) ) { esc_html_e( $this->options['woonplaats'] ); } ?>" id="<?php echo $this->tag; ?>[woonplaats]" name="<?php echo $this->tag; ?>[woonplaats]"/>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
		</p>
	</form>
</div>