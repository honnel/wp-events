<?php
/*-------------------------------------------------------------
 Name:      events_activate

 Purpose:   Creates database tables if they don't exist
 Receive:   -none-
 Return:	-none-
-------------------------------------------------------------*/
function events_activate() {
	global $wpdb;

	if ( $wpdb->has_cap( 'collation' ) ) {
		if ( ! empty($wpdb->charset) )
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		if ( ! empty($wpdb->collate) )
			$charset_collate .= " COLLATE $wpdb->collate";
	}

	if(!events_mysql_table_exists("{$wpdb->prefix}events")) { // Add table if it's not there
		$wpdb->query("CREATE TABLE `{$wpdb->prefix}events` (
	  		`id` mediumint(8) unsigned NOT NULL auto_increment PRIMARY KEY,
	  		`title` longtext NOT NULL,
	  		`title_link` varchar(3) NOT NULL default 'N',
	  		`location` varchar(255) NOT NULL,
	  		`category` int(11) unsigned NOT NULL default '1',
	  		`pre_message` longtext NOT NULL,
	  		`post_message` longtext NOT NULL,
	  		`link` longtext NOT NULL,
	  		`allday` varchar(3) NOT NULL default 'N',
	  		`thetime` int(15) unsigned NOT NULL default '0',
	  		`theend` int(15) unsigned NOT NULL default '0',
	  		`author` varchar(60) NOT NULL default '',
	  		`priority` varchar(4) NOT NULL default 'no',
	  		`archive` varchar(4) NOT NULL default 'no'
			) ".$charset_collate
		);
	}

	if(!events_mysql_table_exists("{$wpdb->prefix}events_categories")) {
		$wpdb->query("CREATE TABLE `{$wpdb->prefix}events_categories` (
			`id` mediumint(8) unsigned NOT NULL auto_increment PRIMARY KEY,
			`name` varchar(255) NOT NULL
			) ".$charset_collate
		);
	}
}

/*-------------------------------------------------------------
 Name:      events_deactivate

 Purpose:   Deactivate script
 Receive:   -none-
 Return:	-none-
-------------------------------------------------------------*/
function events_deactivate() {
	// 42
}

/*-------------------------------------------------------------
 Name:      events_mysql_table_exists

 Purpose:   Check if the table exists in the database
 Receive:   -none-
 Return:	-none-
-------------------------------------------------------------*/
function events_mysql_table_exists($table_name) {
	global $wpdb;

	foreach ($wpdb->get_col("SHOW TABLES",0) as $table ) {
		if ($table == $table_name) {
			return true;
		}
	}
	return false;
}

/*-------------------------------------------------------------
 Name:      events_mysql_warning

 Purpose:   Database errors if things go wrong
 Receive:   -none-
 Return:	-none-
-------------------------------------------------------------*/
function events_mysql_warning() {
	echo '<div class="updated"><h3>'.__('WARNING!', 'wpevents').' '.__('The MySQL table was not created! You cannot store events. See if you have the right MySQL access rights and check if you can create tables.', 'wpevents').' '.__('Contact your webhost/sysadmin if you must.', 'wpevents').' '.sprintf(__('If this brings no answers seek support at <a href="%s">%s</a>', 'wpevents'),'http://meandmymac.net/contact-and-support/?pk_campaign=wpevents-databaseerror&pk_kwd=support', 'http://meandmymac.net/support/').'. '.__('Please give as much information as you can related to your problem.', 'wpevents').'</h3></div>';
}

/*-------------------------------------------------------------
 Name:      events_plugin_uninstall

 Purpose:   Delete the entire database table and remove the options on uninstall.
 Receive:   -none-
 Return:	-none-
-------------------------------------------------------------*/
function events_plugin_uninstall() {
	global $wpdb;

	// Deactivate Plugin
	$current = get_settings('active_plugins');
    array_splice($current, array_search( "wp-events/wp-events.php", $current), 1 );
	update_option('active_plugins', $current);
	do_action('deactivate_' . trim( $_GET['plugin'] ));

	// Drop MySQL Tables
	$wpdb->query("DROP TABLE `{$wpdb->prefix}events`");
	$wpdb->query("DROP TABLE `{$wpdb->prefix}events_categories`");

	// Delete Option
	delete_option('events_config');
	delete_option('events_template');
	delete_option('events_language');

	events_return('uninstall');
}
?>