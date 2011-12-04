<?php
/**
 * All Meetle
 *
 * @package ElggFile
 */

elgg_push_breadcrumb(elgg_echo('meetle'));

elgg_register_title_button();

$limit = get_input("limit", 10);

$title = elgg_echo('meetle:all');

$content = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'meeting',
	'limit' => $limit,
	'full_view' => FALSE
));
if (!$content) {
	$content = elgg_echo('meetle:none');
}

$sidebar = elgg_view('meetle/sidebar');

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);
