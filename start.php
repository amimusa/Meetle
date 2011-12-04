<?php
/**
 * Schedule Social Management
 */

elgg_register_event_handler('init', 'system', 'meetle_init');

function meetle_init() {
	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('meetle', 'meetle_page_handler');
	
}

function meetle_page_handler($page) {
	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	$pages_dir = elgg_get_plugins_path() . 'meetle/pages/meetle';

	$page_type = $page[0];
	switch ($page_type) {
		case 'owner':
			include "$pages_dir/owner.php";
			break;
		case 'friends':
			include "$pages_dir/friends.php";
			break;
		case 'view':
			set_input('guid', $page[1]);
			include "$pages_dir/view.php";
			break;
		case 'add':
			include "$pages_dir/new.php";
			break;
		case 'edit':
			set_input('guid', $page[1]);
			include "$pages_dir/edit.php";
			break;
		case 'group':
			include "$pages_dir/owner.php";
			break;
		case 'all':
			include "$pages_dir/world.php";
			break;
		default:
			return false;
	}
	return true;

}
