<?php

add_action('wp_footer', function() {
  $schema = array(
    // Tell search engines that this is structured data
    '@context'  => 'http://schema.org',
    // Tell search engines the content type it is looking at
    '@type'     => 'Person',
    // Provide search engines with the site name and address
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => get_field('town', 'options'),
        'postalCode' => get_field('zip', 'options'),
        'streetAddress' => get_field('street', 'options')
      ],
    'name' => get_field('contact_name', 'options'),
    'email' => get_field('contact_email', 'options'),
    'telephone' => '+44' . get_field('contact_phone', 'options'), //needs country code
    'url'       => get_home_url(),
    'image' => get_field('contact_photo', 'options')
    // Provide the company address

  );

echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
});

?>
