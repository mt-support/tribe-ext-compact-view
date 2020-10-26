<?php
/**
 * View: Compact View Date separator
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/compact/date-separator.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 1.0.0
 *
 * @var array              $events       The array of events for the date group.
 * @var WP_Post            $event        The event post object with properties added by the `tribe_get_event` function.
 * @var \DateTimeInterface $request_date The request date object. This will be "today" if the user did not input any
 *                                       date, or the user input date.
 * @var bool               $is_past      Whether the current display mode is "past" or not.
 *
 * @see tribe_get_event() For the format of the event object.
 */

use Tribe\Extensions\Compact_View\Utils;

if ( empty( $is_past ) && ! empty ( $request_date ) ) {
	$should_have_date_separator = Utils\Separators::should_have_date( $events, $event, $request_date );
} else {
	$should_have_date_separator = Utils\Separators::should_have_date( $events, $event );
}

if ( ! $should_have_date_separator ) {
	return;
}

/*
 * Depending on the request date we show the later date between the real event start date and the request date.
 * This avoids users from seeing results "in the past" in relation to an input date or "today".
 * This does not apply to past events.
 */
$sep_date = empty( $is_past ) && ! empty( $request_date )
	? max( $event->dates->start_display, $request_date )
	: $event->dates->start_display;
?>
<div class="tribe-events-calendar-list__date-separator">
	<time
		class="tribe-events-calendar-list__date-separator-text tribe-common-h7 tribe-common-h6--min-medium tribe-common-h--alt"
		datetime="<?php
		echo esc_attr( $sep_date->format( 'Y-m-d' ) ); ?>"
	>
	</time>
</div>
