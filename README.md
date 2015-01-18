# Events
This is a fork of [wp-events](https://wordpress.org/plugins/wp-events/) with export feature for events as ics-File.

* Contributors: Arnan de Gans, Daniel Hammann
* Donate link: [http://meandmymac.net/donate/](http://meandmymac.net/donate/)
* Tags: events, event, countdown, plugin, admin, theme, template, event, archive, dashboard, widget
* Requires at least: 3.0, PHP5.2
* Tested up to: 4.1.
* Stable tag: 2.2.4.2

Create a list with events/appointments/concerts/future happenings and show them on your site. Includes optional widget and advanced page options.

## Description

The plugin features a straightforward user interface in the Wordpress dashboard to add/edit and delete events and set some options. 
Events allows you to list Events on a seperate page or in the sidebar, or both. Here you can list Old (archived) events future events and if you want, events happening today.
When you create or edit an event you can set it to be archived. So that it remains listed. Optionally non-archived events are automatically deleted one day (24 hours) after they expire. Many more options are available and Events is completely customizable to your theme in an easy and flexible manner.

For support, go to the [forum](http://wordpress.org/support/plugin/wp-events).
For usage instructions, go to the [plugin](http://meandmymac.net/plugins/events/2/) pages.

## Features
### Export Feature
* You can add `[events_ics_download]` to any site or article, this will add a ics-File Download button.
* You can filter for a specific category by adding a category parameter: e.g. `[events_ics_download category="1"]`

### Other Features
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

## Installation
Caution: this plugin requires PHP5.2 or newer! Make sure you have PHP5.2 or newer! This plugin does NOT work with WP2.6 or older. 

Installation with widget:

1. Upload the events folder to your wp-content/plugins/ folder.
1. Activate the plugin and widget from the "plugins" page.
1. Goto Settings > Events and configure the plugin where required.
1. You can now go to Events > Add|edit Event to schedule events.
1. Once an event is saved you can manage them from Events > Manage.
1. Make a donation. ItÕs well appreciated!

For more instructions and additional information review the [Plugin page](http://meandmymac.net/plugins/events/2/).
Find out how to implement Events on pages, without a widget and many more options...

For help, go to the [support](http://wordpress.org/support/plugin/wp-events) pages.


## Frequently Asked Questions

**Visit here for support:**
[Support!](http://wordpress.org/support/plugin/wp-events)

## Known Issues
* You can not use multiple buttons on single site
* Timezone for export is set hardcoded to `Europe/Berlin`, for switching to another timezone edit `wp-events-ics-export-functions.php` in line 98 and 103.