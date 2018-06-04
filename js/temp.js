(function($) {
console.log('This javascript snippet works');
  // Fetch our events
$.ajax({
      url: "http://localhost/drupal/drupal/api_getcalendar",
    method: "GET",
    datatype: "json",
  }).done(function(response) {
    // Parse our events into an event object for FullCalendar
    console.log(response);
    var events = [];
    $.each(response, function(idx, e) {
      events.push({
        start: e.field_start_date,
        end: e.field_end_date,
        title: e.title,
        url: e.field_url,
      });
    });
    $('#calendar').fullCalendar({
      events: events
    });
  });
  
})(jQuery);
