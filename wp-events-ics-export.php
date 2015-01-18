<?php

/*-------------------------------------------------------------
 Name:      events_ics_download

 Purpose:   Creates ics download link. 
            template [events_ics_download]
 Return:    $output
-------------------------------------------------------------*/
function events_ics_download($atts, $content = null) {
    if(empty($atts['category'])) {
		$category = '';
	} else {
        $id = filter_var($atts['category'], FILTER_SANITIZE_NUMBER_INT);
		$category = " AND `category`=".$id;
	}

    $output = "<form action=\"wp-content/plugins/wp-events-ics-export/wp-events-ics-export-download.php\" method=\"post\">
    <input type=\"hidden\" name=\"filename\" value=\"calendar.ics\" />
    <input type=\"hidden\" name=\"content\" value=\"".get_ical_events($category)."\" />
    <button>Download</button>";    
    return $output;
}

/*-------------------------------------------------------------
 Name:      dateToCal

 Purpose:   Converts a unix timestamp to an ics-friendly format 
 Note:      "Z" means that this timestamp is a UTC timestamp. If you need
            to set a locale, remove the "\Z" and modify DTEND, DTSTAMP and DTSTART
            with TZID properties (see RFC 5545 section 3.3.5 for info)
            
            Also note that we are using "H" instead of "g" because iCalendar's Time format
            requires 24-hour time (see RFC 5545 section 3.3.12 for info).
 Receive:   $timestamp
 Return:    date in ics format
-------------------------------------------------------------*/
function dateToCal($timestamp) {
    return gmstrftime('%Y%m%dT%H%M%S', $timestamp);
}

/*-------------------------------------------------------------
 Name:      escapeString

 Purpose:   Escapes a string of characters
 Receive:   $string
 Return:    escaped string
-------------------------------------------------------------*/
function escapeString($string) {
  return preg_replace('/([\,;])/','\\\$1', $string);
}

/*-------------------------------------------------------------
 Name:      eie_get_ical_events

 Purpose:   Creates ics formated events based on given events.
 Notes: - the UID should be unique to the event, so in this case I'm just using
          uniqid to create a uid, but you could do whatever you'd like.
        
        - iCal requires a date format of "yyyymmddThhiissZ". The "T" and "Z"
          characters are not placeholders, just plain ol' characters. The "T"
          character acts as a delimeter between the date (yyyymmdd) and the time
          (hhiiss), and the "Z" states that the date is in UTC time. Note that if
          you don't want to use UTC time, you must prepend your date-time values
          with a TZID property. See RFC 5545 section 3.3.5
        
        - The Content-Disposition: attachment; header tells the browser to save/open
          the file. The filename param sets the name of the file, so you could set
          it as "my-event-name.ics" or something similar.
        
        - Read up on RFC 5545, the iCalendar specification. There is a lot of helpful
          info in there, such as formatting rules. There are also many more options
          to set, including alarms, invitees, busy status, etc.
        
          https://www.ietf.org/rfc/rfc5545.txt

 Source:    Based on https://gist.github.com/jakebellacera/635416
 Receive:   $events
 Return:    $output
-------------------------------------------------------------*/
function get_ical_events($category) {
    global $wpdb;
    $result_string = "";
    
    $present = current_time('timestamp');
    $events = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."events` WHERE `theend` >= $present$category");
    
    if (count($events) == 0) {
    } else {
        $result_string .= "BEGIN:VCALENDAR\r\n";
        $result_string .= "VERSION:2.0\r\n";
        $result_string .= "PRODID:-//hacksw/handcal//NONSGML v1.0//EN\r\n";
        $result_string .= "CALSCALE:GREGORIAN\r\n";
        foreach($events as $event) {                
            $result_string .= "BEGIN:VEVENT\r\n";
            $result_string .= "DTEND:" .dateToCal($event->theend). "\r\n";
            $result_string .= "UID:" .uniqid(). "\r\n";
            $result_string .= "DTSTAMP;TZID=Europe/Berlin:" .dateToCal(time()). "\r\n";
            $result_string .= "LOCATION:" .escapeString($event->location). "\r\n";
            $result_string .= "DESCRIPTION:" .escapeString($event->pre_message). "\r\n";
            $result_string .= "URL;VALUE=URI:" .escapeString($event->link). "\r\n";
            $result_string .= "SUMMARY:" .escapeString($event->title). "\r\n";
            $result_string .= "DTSTART;TZID=Europe/Berlin:" .dateToCal($event->thetime). "\r\n";
            $result_string .= "END:VEVENT\r\n";
        }
        $result_string .= "END:VCALENDAR";
    }
    
    return $result_string;
}

?>