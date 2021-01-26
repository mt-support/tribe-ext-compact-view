<?php
/**
 * View: Summary View - Single Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/summary/event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @since 1.0.0
 *
 * @var WP_Post                          $event      The event post object with properties added by the `tribe_get_event` function.
 * @var \Tribe\Utils\Date_I18n_Immutable $group_date The date for the date group.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 1.0.0
 */
use Tribe__Date_Utils as Dates;

//$event->schedule_details;
$formatted_start_date = $event->dates->start->format( Dates::DBDATEFORMAT );
?>
<div class="tribe-common-b3 tribe-events-calendar-summary__event-datetime-wrapper">
	<time
		class="tribe-events-calendar-summary__event-datetime"
		datetime="<?php echo esc_attr( $formatted_start_date ); ?>"
		title="<?php echo $event->start_date . ' :: ' . $event->end_date; ?>"
	>
		<?php if ( $event->summary_view->is_all_day ) : ?>
			<?php $this->template( 'summary/event/date/all-day', [ 'event' => $event ] ); ?>
		<?php elseif ( $event->summary_view->is_multiday_start ) : ?>
			<?php $this->template( 'summary/event/date/multiday-start', [ 'event' => $event ] ); ?>
		<?php elseif ( $event->summary_view->is_multiday_end ) : ?>
			<?php $this->template( 'summary/event/date/multiday-end', [ 'event' => $event ] ); ?>
		<?php else : ?>
			<?php $this->template( 'summary/event/date/single', [ 'event' => $event ] ); ?>
		<?php endif; ?>
	</time>
	<?php $this->template( 'summary/event/date/meta', [ 'event' => $event ] ); ?>
	<?php $this->template( 'summary/event/date/recurring' ); ?>
</div>
<?php $fnord = $event->summary_view; ?>
<?php $foo = ''; ?>
