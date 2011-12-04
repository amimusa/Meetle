<?php
/**
 * View a file
 *
 * @package ElggFile
 */

$meeting = get_entity(get_input('guid'));

$owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb(elgg_echo('meetle'), 'meetle/all');

$crumbs_title = $owner->name;
if (elgg_instanceof($owner, 'group')) {
	elgg_push_breadcrumb($crumbs_title, "meetle/group/$owner->guid/all");
} else {
	elgg_push_breadcrumb($crumbs_title, "meetle/owner/$owner->username");
}

$title = $meeting->title;

elgg_push_breadcrumb($title);

$content = elgg_view_entity($meeting, array('full_view' => true));
$content .= elgg_view_comments($meeting);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
