<?php
global $wp_query, $wpdb, $current_user, $fields_array;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$page_slug = get_query_var('marketing_page_id');

$pages_table = $wpdb->prefix . 'marketing_templates';

$sql = $wpdb->prepare( "SELECT * FROM $pages_table WHERE page_slug = '%s'", $page_slug );
$query = $wpdb->get_row( $sql );

$template_used = $query->template_used;

$page_id = $query->tid;
$marketingPageID = $page_id;

$page_details = $query->template;
$page_details_obj = maybe_unserialize($page_details);
$enabled_fields = $page_details_obj['form_fields'];

?>
<form action="<?php echo $actual_link; ?>" method="post" class="stage-marketing-form" id="marketing-page-form" data-page-id="<?php echo $page_id; ?>">
	<input type="hidden" id="marketing-page-form-sent" name="marketing-page-form-sent" value="marketing-page-<?php echo $page_id; ?>">
	<input type="hidden" id="user_id" name="user_id" value="<?php echo $current_user->ID; ?>">
	<div id="signupper">
		<div id="primary_fields">

			<?php if( in_array( 'email', $enabled_fields ) ): ?>
			<div id="email">
				<label for="subscriber_email" class="pr">Email address: *</label>
				<span class=" subscriber_email">
					<input type="email" name="subscriber_email" value="" size="40" class="email-field form-control" id="subscriber_email" data-validate="validate(required, email)">
				</span>
			</div>
			<?php endif; ?>
			
			<?php if( in_array( 'title', $enabled_fields ) ): ?>
			<div id="title">
				<label for="subscriber_title" class="pr">Title: *</label>
				<span class=" subscriber_title">
					<input type="text" name="subscriber_title" value="" size="40" class="title-field form-control" id="subscriber_title" data-validate="validate(required)">
				</span>
			</div>
			<?php endif; ?>

			<?php if( in_array( 'first_name', $enabled_fields ) ): ?>
			<div id="first_name">
				<label for="subscriber_first_name" class="pr">First name: *</label>
				<span class=" subscriber_first_name">
					<input type="text" name="subscriber_first_name" value="" size="40" class="first-name-field form-control" id="subscriber_first_name" data-validate="validate(required, minlength(3))">
				</span>
			</div>
			<?php endif; ?>

			<?php if( in_array( 'last_name', $enabled_fields ) ): ?>
			<div id="last_name">
				<label for="subscriber_last_name" class="pr">Last name: *</label>
				<span class=" subscriber_last_name">
					<input type="text" name="subscriber_last_name" value="" size="40" class="last-name-field form-control" id="subscriber_last_name" data-validate="validate(required, minlength(3))">
				</span>
			</div>
			<?php endif; ?>

			<?php if( in_array( 'post_code', $enabled_fields ) ): ?>
			<div id="post_code">
				<label for="subscriber_post_code" class="pr">Post code: *</label>
				<span class=" subscriber_post_code">
					<input type="text" name="subscriber_post_code" value="" size="40" class="postcode-field form-control" id="subscriber_post_code" data-validate="validate(required, ukpostcode)">
				</span>
			</div>
			<?php endif; ?>

			<?php if( in_array( 'birthday', $enabled_fields ) ): ?>
			<div id="birthday">
				<label for="subscriber_birthday" class="pr">Date of Birth: *</label>
				<span class="subscriber_birthday">
					<input type="text" name="subscriber_birthday" value="" size="40" class="form-control" id="subscriber_birthday" data-validate="validate(required)">
				</span>
			</div>
			<?php endif; ?>
		</div>

		<?php if( in_array( 'career_stage', $enabled_fields ) ): ?>
		<div id="career_stage">
			<h3>Which stage are you at in your career? *</h3>
			<p>
				<span class=" subscriber_career_stage">
					<select name="subscriber_career_stage" class=" wpcf7-select  career-stage-field" id="subscriber_career_stage">
						<option value="">---</option>
						<option value="Professional">Professional</option>
						<option value="Student - Drama School">Student - Drama School</option>
						<option value="Student - College/University">Student - College/University</option>
						<option value="Amateur">Amateur</option>
						<option value="Graduate within 2 years - Drama School">Graduate within 2 years - Drama School</option>
						<option value="Graduate within 2 years - College/University">Graduate within 2 years - College/University</option>
					</select>
				</span>
			</p>
		</div>
		<?php endif; ?>

		<?php if( 'schools' == $template_used ): ?>
		<?php if( in_array( 'interests', $enabled_fields ) ): ?>
		<div id="interests">
			<h3>What is your primary area of interest? *</h3>
			<p>
				<span class=" subscriber_interests">
					<div class="css3-columns clearfix">
						<div class="interests-col-left col-md-6 col-xs-12 clearfix">
							<span class="wpcf7-list-item first">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Acting" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Acting</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Musical Theatre" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Musical Theatre</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Dancer" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Dancer</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Musician" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Musician</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Comedy / Light Entertainment" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Comedy / Light Entertainment</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Stage Management" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Stage Management</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Backstage / Technical" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Backstage / Technical</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Backstage / Design" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Backstage / Design</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Producing" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Producing</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Directing" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Directing</span>
								</label>
							</span>
						</div>

						<div class="interests-col-right col-md-6 col-xs-12">
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Writing" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Writing</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Sales / Marketing" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Sales / Marketing</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Arts Administration &amp; Management" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Arts Administration &amp; Management</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Teaching &amp; Education" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Teaching &amp; Education</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Cabaret / Drag" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Cabaret / Drag</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Voice Recording Artist" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Voice Recording Artist</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Singer" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Singer</span>
								</label>
							</span>
							<span class="wpcf7-list-item">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="TV / Film" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">TV / Film</span>
								</label>
							</span>
							<span class="wpcf7-list-item last">
								<label class="checkbox">
									<span class="icon"></span>
									<span class="icons">
										<span class="first-icon fui-checkbox-unchecked"></span>
										<span class="second-icon fui-checkbox-checked"></span>
									</span>
									<input type="checkbox" name="subscriber_interests[]" value="Radio" data-toggle="checkbox">
									<span class="wpcf7-list-item-label">Radio</span>
								</label>
							</span>
						</div>
					</div>
				</span>
			</p>
		</div>
		<?php endif; ?>
		<?php endif; ?>

		<div id="opt-in">
			<span class=" subscriber_opt_in">
				<span id="subscriber_opt_in" class="  wpcf7-checkbox optin-field">
					<span class="wpcf7-list-item">
						<label class="checkbox">
							<input type="hidden" name="subscriber_opt_in" value="no">
							<span class="icons">
								<span class="first-icon fui-checkbox-unchecked"></span>
								<span class="second-icon fui-checkbox-checked"></span>
							</span>
							<input type="checkbox" name="subscriber_opt_in" value="yes" data-toggle="checkbox">
							<span class="wpcf7-list-item-label">
                             The Stage will NOT share your information with any 3rd parties. From time to we may send you some lovely offers in relation to The Stage and The Stage Castings. Please tick this box [ ] if you don't want to be sent these messages.
							</span>
						</label>
					</span>
				</span>
			</span>
		</div>
		<div id="subscribe-button">
			<input type="submit" value="Submit" class="btn btn-primary subscribe-button" id="subscribe_send">
			<img class="ajax-loader" src="http://www.thestage.co.uk/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;">
		</div>
	</div>
	<div class="wpcf7-response-output wpcf7-display-none"></div>
</form>
<script type="text/javascript">
        $.ketchup.validation(
            'ukpostcode',
            'Please enter a valid UK postcode',
            function(form, el, value){
                var tidyValue = value.replace(/\s+/g, '');
                var pattern = /^(GIR0AA)|((([A-PR-UWYZ][0-9][0-9]?)|(([A-PR-UWYZ][A-HK-Y][0-9][0-9]?)|(([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))))[0-9][ABD-HJLNP-UW-Z]{2})$/i;
                return pattern.test(tidyValue);
            }
        );
        $(document).ready(function(){
        	$('.subscriber_birthday input').datepicker();
            $('form#marketing-page-form').ketchup().submit(function() {
                if ( $(this).ketchup('isValid') ) {
                    var form_loader = new ajaxLoader($('form#marketing-page-form'));
                    var formdata = $('form#marketing-page-form').serialize();

                    $.ajax({
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        type: "POST",
                        data: {
                            action: 'STAGE_MARKETING_PAGES_Process_Form_Submit',
                            user_id: <?php echo $current_user->ID; ?>,
                            page_id: <?php echo $marketingPageID; ?>,
                            thedata: formdata
                        },
                        success: function(result) {
                            form_loader.remove();
                            var output = parseInt(result);
                            if(1==output) {
                                $('form#marketing-page-form').find('input:text, input[type="email"], input:password, select, textarea').val('');
                                $('form#marketing-page-form').find('input:radio, input:checkbox').prop('checked', false);
                                var body = $("html, body");
                                body.animate({scrollTop:0}, '500', 'swing', function() {
                                    $.noop();
                                });
                                $('.error').hide();
                                $('.success').slideDown(50);
                                setTimeout(function(){
                                    $('.success').slideUp(200);
                                },2000);
                            }
                            else {
                                $('.success').slideUp(50);
                            	$('.error').slideDown(50);
                            }
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            form_loader.remove();
                            $('.success').slideUp(50);
                            $('.error').slideDown(50);
                        }
                    })
                }
                return false;
            });
        });
</script>

