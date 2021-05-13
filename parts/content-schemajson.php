<?php

	add_action('wp_footer', function() {
	  $schema = array(
	    // Tell search engines that this is structured data
	    '@context'  => "http://schema.org",
	    // Tell search engines the content type it is looking at
	    '@type'     => get_field('schema_type', 'options'),
	    // Provide search engines with the site name and address
	    'name'      => get_field('company_name', 'options'),
	    'telephone' => '+44' . get_field('company_phone', 'options'), //needs country code
	    'url'       => get_home_url(),
	    'description' => get_bloginfo('description'),
			'priceRange' => "Not applicable",
	    'image' => get_field('company_logo', 'options')
	    // Provide the company address

	  );
	  $schema['address'] = array();
	  $schema['openingHoursSpecification'] = array();
	  if (have_rows('address_details', 'options')) { //parent repeater
	  // Then set up the array



	  // For each row...
	  while (have_rows('address_details', 'options')) : the_row();
	    // ...check if it's marked "Closed"...

	    // ...then output the times
	    $addresses = array(
	      '@type'           => 'PostalAddress',
	      'streetAddress'   => get_sub_field('address_street', 'options'),
	      'postalCode'      => get_sub_field('address_postal', 'options'),
	      'addressLocality' => get_sub_field('address_locality', 'options'),
	      'addressRegion'   => get_sub_field('address_region', 'options'),
	      'addressCountry'  => get_sub_field('address_country', 'options'),
	      'name'  => get_sub_field('location_name', 'options')
	    );
	    if (have_rows('opening_times', 'options')) {
	    // Then set up the array

	    // For each row...
	    while (have_rows('opening_times', 'options')) : the_row();
	    // ...check if it's marked "Closed"...

	    // ...then output the times
	    $openings = array(
	      '@type'     => 'openingHoursSpecification',
	      'dayOfWeek' => get_sub_field('opening_days'),
	      'opens'     => get_sub_field('start_time'),
	      'closes'    => get_sub_field('finish_time')
	    );
	    // Finally, push this array to the schema array

	    array_push($schema['openingHoursSpecification'], $openings);

	    endwhile;
	    }
	// can you add openingHoursSpecification schema to each address?

	// at the moment this is adding an OpeningHoursSpecification array within the address array

	    // Finally, push this array to the schema array
	    array_push($schema['address'], $addresses);



	  endwhile;
	}

	if (have_rows('special_days', 'option')) {
	  // For each row...
	  while (have_rows('special_days', 'option')) : the_row();
	    // ...check if it's marked "Closed"...

	    // ...then output the times
	    $special_days = array(
	      '@type'        => 'OpeningHoursSpecification',
	      'validFrom'    => get_sub_field('date_from'),
	      'validThrough' => get_sub_field('date_to'),
	      'opens'        => '00:00',
	      'closes'       => '00:00'
	    );
	    // Finally, push this array to the schema array
	    array_push($schema['openingHoursSpecification'], $special_days);

	  endwhile;
	}

	if (have_rows('social_media', 'option')) {
	  $schema['sameAs'] = array();
	  // For each instance...
	  while (have_rows('social_media', 'option')) : the_row();
	    // ...add it to the schema array
	    array_push($schema['sameAs'], get_sub_field('url'));
	  endwhile;
	}


	echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
	});


 ?>
