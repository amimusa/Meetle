<?php
/**
 * Individual's or group's meetings
 *
 * @package ElggFile
 */

// access check for closed groups
group_gatekeeper();

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('meetle/all');
}

elgg_push_breadcrumb(elgg_echo('meetle'), "meetle/all");
elgg_push_breadcrumb($owner->name);

elgg_register_title_button();

$params = array();

if ($owner->guid == elgg_get_logged_in_user_guid()) {
	// user looking at own meetings
	$params['filter_context'] = 'mine';
} else if (elgg_instanceof($owner, 'user')) {
	// someone else's meetings
	// do not show select a tab when viewing someone else's meetings
	$params['filter_context'] = 'none';
} else {
	// group files
	$params['filter'] = '';
}

$title = elgg_echo("meetle:owner", array($owner->name));

// List files
$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'meeting',
	'container_guid' => $owner->guid,
	'limit' => 10,
	'full_view' => FALSE,
));
if (!$content) {
	$content = elgg_echo("meetle:none");
}

$sidebar = elgg_view('meetle/sidebar');

$params['content'] = $content;
$params['title'] = $title;
$params['sidebar'] = $sidebar;

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
