<?php
/**
 * Create a new meeting
 *
 * @package ElggFile
 */

$owner = elgg_get_page_owner_entity();

gatekeeper();
group_gatekeeper();

$title = elgg_echo('meetle:add');

// set up breadcrumbs
elgg_push_breadcrumb(elgg_echo('meetle'), "meetle/all");
if (elgg_instanceof($owner, 'user')) {
	elgg_push_breadcrumb($owner->name, "meetle/owner/$owner->username");
} else {
	elgg_push_breadcrumb($owner->name, "meetle/group/$owner->guid/all");
}
elgg_push_breadcrumb($title);

// create form
$form_vars = array();
$body_vars = array();
$content = elgg_view_form('meetle/edit', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
