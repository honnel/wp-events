=== Events ===
Contributors: adegans
Donate link: http://meandmymac.net/donate/?pk_campaign=wordpressorg
Tags: events, event, countdown, plugin, admin, theme, template, event, archive, dashboard, widget
Requires at least: 3.5
Tested up to: 4.4
Stable tag: 2.3.4
License: GPLv2

Create a list with events/appointments/concerts/future happenings and show them on your site. Includes optional widget and advanced page options.

== Description ==

The plugin features a straightforward user interface in the Wordpress dashboard to add/edit and delete events and set some options. 
Events allows you to list Events on a seperate page or in the sidebar, or both. Here you can list Old (archived) events future events and if you want, events happening today.
When you create or edit an event you can set it to be archived. So that it remains listed. Optionally non-archived events are automatically deleted one day (24 hours) after they expire. Many more options are available and Events is completely customizable to your theme in an easy and flexible manner.

For support, go to the [forum](http://wordpress.org/support/plugin/wp-events).

**Features**

* Widget for themes that support it
* Separate page for events
* Completely customizable layout
* Multi language
* Link events to pages/posts
* Set a start and end time (duration) for events
* Set locations for events
* Show events in your sidebar
* Archive events
* Edit existing events
* Auto remove old, non-archived events
* Unlimited dateformats to show events dates
* Options page
* Set a date and time to the minute
* Set a message to show before and another one to show after the event occurs
* User level restriction
* Management page
* Set amount of events to show in the sidebar
* Un-install option to remove the database table
* And more, see for yourself...

== Installation ==

= Installation with widget =

1. Upload the events folder to your wp-content/plugins/ folder.
1. Activate the plugin and widget from the "plugins" page.
1. Goto Settings > Events and configure the plugin where required.
1. You can now go to Events > Add|edit Event to schedule events.
1. Once an event is saved you can manage them from Events > Manage.
1. Make a donation. It’s well appreciated!

Events can show various types of lists wherever you want on your blog. Take a look at the samples below and make your own creative construction with it. You can use as much lists as you want on as many places as you like.

== Frequently Asked Questions ==

Visit here for [support!](http://wordpress.org/support/plugin/wp-events)

== Screenshots ==

1. The screen where you add events
2. Event management
3. A few options of the options panel, many more options are available

== Changelog ==

= 2.3.4 =

* [change] Moved translation files into subfolder
* [change] Updated credits links

= 2.3.3 =

* [change] Updated credits links
* [fix] Widget time formatting

= 2.3.1 & 2.3.2 =

* [change] Updated to use date_i18n for localised dates
* [change] Now uses more modern date formatting


= 2.3 =

* [i18n] Updated all translations and included them in main download
* [change] Updated to work with WordPress 4 and newer
* [fix] Numerous "undefined" notices
* [fix] All inputs now properly escaped and filtered

= 2.2.4.1 =

* [change] Compatibility info, internal links for support
* [change] New, more efficient, RSS widget

= 2.2.4 =

* [fix] Rich text editor for adding and editing events

= 2.2.3 =

* [fix] Quotes from templates being escaped with slashes on some servers
* [change] Dashboard widgets show only if the user has a high enough level for it
* [change] Events now uses the SimplePIE RSS engine

= 2.2.2 =

* [fix] Todays date in the various list views now calculates the start of the day correctly
* [fix] Link to manage page after creating events
* [fix] End date can no longer be earlier than the start date
* [fix] Newlines not applied to sidebar in events description
* [fix] Enddate now really hidden when that option is set

= 2.2.1 =

* [fix] Removed review field from database and all calls to that field

= 2.2 =

* [update] Links to support pages
* [change] Sidebar can now also show end dates/times
* [fix] HTML markup/styling of the add event form
* [fix] RSS feed parsing (Widget)
* [change] Default page list now calculates by the enddate instead of start
* [new] More list options for events
* [fix] Todays events now remain in that list until the event is over
* [change] 'Edit event' button is now properly named 'Update event'
* [fix] Options link from sidebar widget
* [fix] End date months are now properly translated using the WP default translation
* [fix] Queries for ongoing events will now work properly in the week, month and day view
* [fix] Description of widget is now saved properly
* [fix] Character translations now follow the charset of the database, generally UTF-8
* [fix] User capabilities are now properly applied
* [fix] HTML markup on the add/edit form
* [change] Forum links updated
* [fix] Recurring events set several options wrong from the 2nd event onwards
* [new] Sidebar view to also list archived events along upcoming events
* [fix] Call to events_editor() now has the correct variables

= 2.1.1 =

* [fix] Plugin now activates properly

= 2.1 =

* [fix] RSS parser now has proper error reporting
* [fix] Add category redirect now points to the right page
* [update] Events editor code
* [new] Translations using PO and MO files
* [new] Editable language strings follow the users locale
* [change] Date localization now follow the WPLANG setting in wp-config.php
* [fix] Locale settings are now properly applied

= 2.0 =

* [change] The old shortcodes are no longer supported. Refer to the manual!
* !! UPDATE THE WAY YOU ADD EVENTS TO YOUR POSTS/PAGES !!
* [change] Moved contents of the stylesheet into the function where it's used
* [fix] Credits links and descriptions
* [new] my RSS feed right into your dashboard
* [fix] Updated remove-old-events query
* [new] Editing of category names
* [update] Cleaned up Widget code, renamed functions more logically
* [fix] Minor background color glitch in the adding form
* [update] Removed last traces of $plugin_tracker of of the Data Project i attempted earlier this year
* [update] Fixed the uninstaller dashboard in Settings to match the rest
* [update] Updated the uninstaller to correctly remove and deactivate Events
* [new] Simple repeating algorithm for events

== Usage ==

= Show a list of events on a page (default) =

Create a new page.
To show just events put in the page field:
`[events_show] OR [events_show type="default"]`
To also show the archive, put in the page field:
`[events_show type="archive"]`
And to show todays Events, put in the page field:
`[events_show type="today"]`
Or to show a weeks worth of Events, put in the page field:
`[events_show type="week"]`
Save the page.

= Customized lists (advanced) =

Show a specific category:
`[events_show category="2"]`
Show a specific event:
`[events_show type="default" event="9"]`
To show just 2 events on your page use:
`[events_show type="today" amount="2"]`
To also show override the sort order:
`[events_show type="default" order="thetime ASC"]`
Or a combination:
`[events_show type="archive" amount="15" order="ID ASC"]`
Note: For the ëorderí field review the table and use a table field name and ASC (ascending) DESC (descending), make no mistake here!

= Sidebar =

For the sidebar you can use the widget. This can be found in your dashboard under appearance. Or you can use PHP to implement the widget manually.

= Some examples =
`echo events_sidebar();`

And some useful variations and options
`echo events_sidebar(5, 2); /* Show 5 events from category 2 */`
`echo events_sidebar('', 3); /* No amount override but show category 3 */`
`echo events_sidebar(8); /* Show 8 events */`
`echo events_sidebar(6, ''); /* Show 6 events */`

== Upgrade Notice ==

= 2.3.3 =

* IMPORTANT: Resave/re-set your chosen date and time formats for scheduled events in Events Settings
* Widget time properly parsed
* Updated credit links

= 2.3.2 =

* IMPORTANT: Resave/re-set your chosen date and time formats for scheduled events in Events Settings
* Sidebar now correctly uses date_i18n

= 2.3.1 =

* IMPORTANT: Resave/re-set your chosen date and time formats for scheduled events in Events Settings
* Updated to use date_i18n for localised dates
* Now uses more modern date formatting