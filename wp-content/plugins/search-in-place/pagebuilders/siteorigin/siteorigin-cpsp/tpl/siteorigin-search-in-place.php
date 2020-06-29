<?php
$shortcode  = '[search-in-place-form';
$shortcode .= (!empty($instance['search_in_page'])) ? ' in_current_page="1"' : '';
$shortcode .= ']';
print $shortcode;