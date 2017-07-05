$(document).ready(function () {

    $("#calendar").fullCalendar({
        events: {
            url: base_url + "home/provideEventData",
            type: "POST",
            error: function () {
                alert("Couldn't fetch the events... :( Try later!");
            }
        },
        eventColor: 'black',
        eventTextColor: 'white',
        eventRender: function(event, element) {
            element.qtip({
                prerender: true,
                content: {
                    text: "<b>" + event.title + "</b><br>" + "Start: " + moment(event.start).format() + "<br>End: " + ((event.end) ? moment(event.end).format() : moment(event.start).format()) + "<br> Created by: " + event.first_name + " " + event.last_name
                },
                style: 'qtip-light'
            });
        }
    });

});