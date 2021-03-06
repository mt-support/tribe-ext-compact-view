<?php
/**
 * View: Summary View - "All Day" date partial.
 * Used for all-day events and any "middle" days of multi-day events.
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/summary/event/date/all-day.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 1.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

?>
<span class="tribe-event-date-start">
	<?php echo esc_html_x( 'All day', 'Label for an all-day event.', 'tribe-ext-summary-view' ); ?>
</span>
