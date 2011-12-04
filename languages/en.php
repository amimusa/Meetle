<?php
/**
 * meetle English language file
 */

$english = array(

	/**
	 * Menu items and titles
	 */
	'meetle' => "Meetings",
	'meetle:add' => "Add meeting",
	'meetle:edit' => "Edit meeting",
	'meetle:owner' => "%s's meetings",
	'meetle:friends' => "Friends' meetings",
	'meetle:all' => "All site meetings",
	'meetle:moremeetle' => "More meetings",
	'meetle:more' => "More",
	'meetle:new' => "A new meeting",
	'meetle:via' => "via meetle",
	'meetle:none' => "No meetings",

	'meetle:delete:confirm' => "Are you sure you want to delete this resource?",

	'meetle:numbertodisplay' => "Number of meetings to display",

	'river:create:object:meetle' => '%s added the meeting %s',
	'river:comment:object:meetle' => '%s commented the meeting %s',
	'meetle:river:annotate' => 'a comment on this meeting',
	'meetle:river:item' => 'an item',

	'item:object:meetle' => 'Meeting',

	'meetle:group' => 'Group meeting',
	'meetle:enablemeetle' => 'Enable group meetings',
	'meetle:nogroup' => 'This group does not have any meeting yet',
	'meetle:more' => 'More meetings',

	'meetle:no_title' => 'No title',

	/**
	 * Status messages
	 */

	'meetle:save:success' => "Your meeting has been created.",
	'meetle:delete:success' => "Your meeting has been deleted.",

	/**
	 * Error messages
	 */

	'meetle:save:failed' => "Your meeting could not be saved. Make sure you've entered a title and then try again.",
	'meetle:delete:failed' => "Your meeting could not be deleted. Please try again.",
);

add_translation('en', $english);
