<?php
/**
 * This document is a short usage example/tutorial
 * for the ScrollingLabel package.  The package is
 * used to create a label whose text moves across
 * the visible area of the label.  The text can 
 * move from left to right, right to left, or bounce
 * between the edges of the label.
 *
 * @author   Anant Narayanan
 * @author   Scott Mattocks
 * @author   Christian Weiske
 * @category Gtk2
 * @package  ScrollingLabel
 */


/* Including our class */
require_once 'Gtk2/ScrollingLabel.php';

/* Initialising the Label */
$theLabel = new Gtk2_ScrollingLabel('Hello World');

/*  Creating a window to add our label to */
$theWindow = new GtkWindow();
$theWindow->set_size_request(600, 100);
$theWindow->connect_simple('destroy', array('Gtk', 'main_quit'));
$theWindow->add($theLabel->getScrollingLabel());
/* Displaying the label */
$theWindow->show_all();


/**
 * We now have a scrolling label. The basic setup is complete.
 * But we must get out label moving!
 */
$theLabel->startScroll();

/**
 * Next lets get things moving faster. The speed is
 * the number of milliseconds between movements of
 * the label.  If you want the label to move faster
 * make the speed smaller.  Slower, make it higher.
 * (Blame Gtk for this one.) The default speed
 * is 70 milliseconds between movements.
 */
$theLabel->setSpeed(100);

/**
 * We can change almost anything about this label.
 * Lets make the text scroll in the opposite direction,
 * show fewer characters at a time, and say something
 * else.
 *
 * 1 is for left and 2 is for right.
 */
$theLabel->setDirection(1);
$theLabel->setVisibleLength(100);
$theLabel->setBounce(true);
$theLabel->setFullText('Gtk2_ScrollingLabel Rocks!');

/**
 * Now we have a label that reads 'ScrollingLabel Rocks'
 * flying by the screen pretty quickly showing only 30
 * characters at a time, moving from left to right.
 * This is all well and good but the real magic happens
 * when you start connecting events.
 *
 * Since the text is whizing by at the speed of light,
 * it would be nice to be able to pause the text so that
 * a user can read it.
 */
$theLabel->setPauseSignal('enter-notify-event');
$theLabel->setUnPauseSignal('leave-notify-event');

/**
 * Now our text will pause right where it is when a user
 * moves the mouse over it.  When they move the mouse
 * away, the text will start scrolling again. Signals 
 * can also be connected for starting and stoping the 
 * the text.  The class can also be extended to allow
 * more methods to be connected to events.
 */
Gtk::main();

?>
