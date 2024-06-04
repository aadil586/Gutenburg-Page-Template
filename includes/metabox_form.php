<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit("You can not access plugin file directly.");// Exit if accessed directly
 }
?>
    <div class="inside cpt-meta">
        <p>
            <label for="project_offer_by">Project offer by:</label>
            <input type="text" name="project_offer_by" id="project_offer_by" class="code" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'project_offer_by', true ) ); ?>" aria-describedby="trackback-url-desc"
        ></p>
        
        <p>
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" class="code" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'company_name', true ) ); ?>" aria-describedby="trackback-url-desc"
        ></p>
        

        <p>
            <label for="project_start_date">Project Start Date:</label>
            <input type="date" name="project_start_date" id="project_start_date" class="code" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'project_start_date', true ) ); ?>" aria-describedby="trackback-url-desc"
        ></p>

        <p>
            <label for="project_end_date">Project End Date:</label>
            <input type="date" name="project_end_date" id="project_end_date" class="code" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'project_end_date', true ) ); ?>" aria-describedby="trackback-url-desc"
        ></p>


    </div>
