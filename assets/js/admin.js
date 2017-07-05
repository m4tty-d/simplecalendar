$("#login_form").submit(function (e) {
    e.preventDefault();

    var formElement = $(this);

    $.ajax({
        type: "POST",
        url: base_url + "/admin/login",
        dataType: "json",
        data: formElement.serialize(),
        success: function (response) {
            if (response.success) {
                window.location = base_url + "admin";
            } else {
                formElement.addClass("invalid");
                setTimeout(function () {
                    formElement.removeClass("invalid");
                }, 500);
            }
        }
    });
});

// New event

$("#new_event").click(function() {
    $("#insert-box").fadeIn();
});

$("#insert-box .background-overlay").click(function() {
    $("#insert-box").fadeOut();
});

$("#insert-form [data-toggle='datepicker']").datepicker({
    format: 'yyyy-mm-dd',
    weekStart: 1,
    autoHide: true
});

$("#insert-form").submit(function(e) {
    e.preventDefault();
    
    var formElement = $(this);
    
    $.ajax({
        type: "POST",
        url: base_url + "/admin/insert",
        dataType: "json",
        data: formElement.serialize(),
        success: function(response) {
            if(response.success) {
                window.location = base_url + "admin";
            } else {
                alert("Something went wrong!");
            }
        }
    });
});

// Delete event

$(".delete_event").click(function(e) {
    e.preventDefault();

    var element = $(this);

    var id = element.attr("data-event_id");

    $.ajax({
        type: "POST",
        url: base_url + "admin/delete",
        dataType: "json",
        data: {id: id},
        success: function(response) {
            if (response.success) {
                element.closest(".event").eq(0).fadeOut();
            } else {
                alert("Something went wrong!");
            }
        }
    });
});

// Edit event

$(".edit_event").click(function(e) {
    e.preventDefault();

    var element = $(this);

    var id = element.attr("data-event_id");

    $.ajax({
        type: "POST",
        url: base_url + "api/getEventData",
        dataType: "json",
        data: {id: id},
        success: function(response) {
            if(response.success) {
                $("#event-id").val(id);
                $("#event-title").val(response.event.title);
                $("#event-start").val(response.event.start);
                $("#event-end").val(response.event.end);

                $("#event-start").datepicker({
                    format: 'yyyy-mm-dd',
                    weekStart: 1,
                    autoHide: true,
                    date: new Date(response.event.start)
                });
                $("#event-end").datepicker({
                    format: 'yyyy-mm-dd',
                    weekStart: 1,
                    autoHide: true,
                    date: new Date(response.event.end)
                });

                $("#edit-box").fadeIn();
            } else {
                alert("Something went wrong!");
            }
        }
    });
});

$("#edit-box .background-overlay").click(function() {
    $("#edit-box").fadeOut();
});

$("#edit-form").submit(function(e) {
    e.preventDefault();

    var formElement = $(this);

    $.ajax({
        type: "POST",
        url: base_url + "/admin/edit",
        dataType: "json",
        data: formElement.serialize(),
        success: function(response) {
            if(response.success) {
                window.location = base_url + "admin";
            } else {
                alert("Something went wrong!");
            }
        }
    });
});