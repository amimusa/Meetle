<?php
/**
 * Edit a meeting
 *
 * @package ElggFile
 */

gatekeeper();

$meeting_guid = (int) get_input('guid');
$meeting = new MeetlePluginMeeting($meeting_guid);
if (!$meeting) {
	forward();
}
if (!$meeting->canEdit()) {
	forward();
}

$title = elgg_echo('meetle:edit');

elgg_push_breadcrumb(elgg_echo('meetle'), "meetle/all");
elgg_push_breadcrumb($meeting->title, $meeting->getURL());
elgg_push_breadcrumb($title);

elgg_set_page_owner_guid($meeting->getContainerGUID());

$form_vars = array();
$body_vars = array();

$content = elgg_view_form('meetle/edit', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
