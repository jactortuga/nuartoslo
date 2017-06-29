<?php

if(have_rows('modules')):

    while(have_rows('modules')) : the_row();

    $layout     = get_row_layout();
    $filepath   = '/partials/'.$layout.'.php';

    if(file_exists(get_template_directory().$filepath)) {
        include(locate_template($filepath));
    } else {
        echo 'File does not exist.';
    }

    endwhile;

endif;

?>