<?php
/*
    Admin Panel
*/

add_action('admin_menu', function(){

    // create new top-level menu
	add_menu_page( __('SPLO Manage Panel', 'splo'), __('SPLO Managing', 'splo'), 'manage_options', 'splo_manage_panel', 'splo_manage_panel_content', '', 10 );

} );


add_action('admin_init', 'splo_settings');

function splo_settings(){
    
    // Check & update critical css
    if(isset($_REQUEST['page']) && $_REQUEST['page'] == 'splo_manage_panel') {

        if(!isset($_POST['splo_critical_css'])) return;

        $critical_css = sanitize_text_field($_POST['splo_critical_css']);

        update_option('splo_critical_css', $critical_css);

    }

}


function splo_manage_panel_content(){

    ?>
    <div class="splo-wrap">
        <h2 class="splo-title"><?php echo get_admin_page_title(); ?></h2>

        <hr>

        <h3 class="splo-section-title"><?php esc_html_e('Critical CSS', 'splo'); ?></h3>

        <form method="post" action="admin.php?page=splo_manage_panel">

            <textarea class="splo-field" name="splo_critical_css" rows="8"><?php echo get_option('splo_critical_css'); ?></textarea>

            <?php submit_button(); ?>

        </form>

    </div>
    <?php

}


add_action('admin_head', 'splo_admin_css');
function splo_admin_css() {

    ?>
    <style>
        #toplevel_page_splo_manage_panel .toplevel_page_splo_manage_panel:not(:hover) .wp-menu-name,
        #toplevel_page_splo_manage_panel .toplevel_page_splo_manage_panel:not(:hover) .wp-menu-image::before {
          color: cyan;
        }
        .splo-field {
            width: 100%;
            display: block;
            background-color: #fff;
        }
        @media(min-width:768px) {
            .splo-wrap {
                width: 50%;
            }
        }
    </style>
    <?php

}
