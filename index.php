<?php get_header(); ?>

    <div id="primary" class="content-area container">
        <main id="main" class="site-main">

			<?php
			if (have_posts()) {
				the_content();
			}

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __('Pages:', 'test_contact_page'),
					'after'  => '</div>',
				)
			);
			?>


			<?php
			$headquarters_address = get_theme_mod('mod_headquarters_address', esc_html__('Global Message Service Ukraine LLC
Bundesstrasse 5 / 3rd Floor
6300 Zug
Switzerland', 'test_contact_page'));
			$headquarters_phone = get_theme_mod('mod_headquarters_phone', esc_html__('+41 41 544 62 00', 'test_contact_page'));
			$headquarters_email = get_theme_mod('mod_headquarters_email', esc_html__('info@gms-worlwide.com', 'test_contact_page'));
			$headquarters_message = get_theme_mod('mod_headquarters_message', esc_html__('Viber Us', 'test_contact_page'));
			$headquarters_form = get_theme_mod('mod_headquarters_form', esc_html__('Contact Us', 'test_contact_page'));
			$support_text = get_theme_mod('mod_support_text', esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'test_contact_page'));
			$support_phone = get_theme_mod('mod_support_phone', esc_html__('+41 41 544 62 00', 'test_contact_page'));

			?>

            <h1><?php esc_html_e('Contacts', 'test_contact_page'); ?></h1>
            <div class="row">
                <div class="col-lg">
                    <h2><?php esc_html_e('GMS Headquarters', 'test_contact_page'); ?></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="headquarters_address"><?php echo $headquarters_address; ?></div>
                            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $headquarters_phone); ?>"
                               class="headquarters_phone"><?php echo $headquarters_phone; ?></a>
                        </div>
                        <div class="col-md-6">
							<?php if ($headquarters_email) { ?>
                                <h5>Email</h5>
                                <a href="mailto:<?php echo $headquarters_email; ?>"
                                   class="headquarters_email"><?php echo $headquarters_email; ?></a>
							<?php } ?>
							<?php if ($headquarters_message && $headquarters_phone) { ?>
                                <h5>Send message</h5>
                                <a href="viber://add?number=<?php echo $headquarters_phone; ?>"
                                   class="headquarters_message"><?php echo $headquarters_message; ?></a>
							<?php } ?>
							<?php if ($headquarters_form) { ?>
                                <h5>Send form</h5>
                                <a id="to_contact_form" href="#contact_wrapper" class="headquarters_form"><?php echo $headquarters_form; ?></a>
							<?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <h2><?php esc_html_e('Technical support 24/7', 'test_contact_page'); ?></h2>
                    <div class="support_text"><?php echo $support_text; ?></div>
                    <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $support_phone); ?>"
                       class="support_phone"><?php echo $support_phone; ?></a>
                </div>
            </div>

            <div class="row no-gutters maps_wrapper">
                <div class="col-lg">
                    <div class="maps_description">
                        <h2><?php esc_html_e('Our Offices', 'test_contact_page'); ?></h2>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="active" id="loc1" href="#location1" data-toggle="tab"><?php esc_html_e('Kyiv', 'test_contact_page'); ?></a>
                            </li>
                            <li class="nav-item"><a id="loc2" href="#location2" data-toggle="tab"><?php esc_html_e('New York', 'test_contact_page'); ?></a>
                            </li>
                            <li class="nav-item"><a id="loc3" href="#location3" data-toggle="tab"><?php esc_html_e('Barselona', 'test_contact_page'); ?></a>
                            </li>
                            <li class="nav-item"><a id="loc4" href="#location4" data-toggle="tab"><?php esc_html_e('Rome', 'test_contact_page'); ?></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane active" id="location1" role="tabpanel">
                                <h3>Global Message Services Ukraine LLC</h3>
                                <p>Kyiv, Stepan Bandera, 33 <br>02066 <br>Ukraine</p>
                            </div>
                            <div class="tab-pane" id="location2" role="tabpanel">
                                <h3>Global Message Services USA LLC</h3>
                                <p>New York, Stepan Bandera, 33 <br>800764 <br>USA</p>
                            </div>
                            <div class="tab-pane" id="location3" role="tabpanel">
                                <h3>Global Message Services Spain LLC</h3>
                                <p>Barselona, Stepan Bandera, 33 <br>356727 <br>Spain</p>
                            </div>
                            <div class="tab-pane" id="location4" role="tabpanel">
                                <h3>Global Message Services Italy LLC</h3>
                                <p>Rome, Stepan Bandera, 33 <br>34256 <br>Italy</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div id="map_canvas"></div>
                </div>
            </div>

            <div id="contact_wrapper">
                <form id="contact" name="contact" method="POST" >
                    <div class="row no-gutters">
                        <div class="col-lg">
                            <h2><?php esc_html_e('Contact Us', 'test_contact_page'); ?></h2>
                            <div class="form_row">
                                <label for="contact_name">Name</label>
                                <input type="text" name="name" id="contact_name" class="to_validate" />
                                <div id="contact_name-error" class="error"></div>
                            </div>
                            <div class="form_row">
                                <label for="contact_phone">Phone</label>
                                <input type="tel" name="phone" id="contact_phone" class="to_validate" placeholder="04489567243"/>
                            <div id="contact_phone-error" class="error"></div>
                            </div>
                            <div class="form_row">
                                <label for="contact_email">Email</label>
                                <input type="email" name="email" id="contact_email" class="to_validate"/>
                                <div id="contact_email-error" class="error"></div>
                            </div>
                            <div class="form_row">
                                <input type="checkbox" name="terms" id="contact_terms" class="to_validate">
                                <label id="input_checkbox" for="contact_terms"></label>
                                <label for="contact_terms">I agree the processing of personal data</label>
                                <div id="contact_terms-error" class="error"></div>
                            </div>
                            <input id="submit" type="submit" value="<?php esc_attr_e('Get in touch', 'test_contact_page'); ?>" disabled />
                        </div>
                        <div class="col-lg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </form>
            </div>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php
get_footer();
