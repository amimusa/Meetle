<?php
/**
 * Friends Meetings
 *
 * @package ElggFile
 */

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('meetle/all');
}

elgg_push_breadcrumb(elgg_echo('meetle'), "meetle/all");
elgg_push_breadcrumb($owner->name, "meetle/owner/$owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

elgg_register_title_button();

$title = elgg_echo("meetle:friends");

// offset is grabbed in list_user_friends_objects
$content = list_user_friends_objects($owner->guid, 'meeting', 10, false);
if (!$content) {
	$content = elgg_echo("meetle:none");
}

$body = elgg_view_layout('content', array(
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);
