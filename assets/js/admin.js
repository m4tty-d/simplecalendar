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

$("#new_event").click(function() {
    $(".insert-box").fadeIn();
});

$(".background-overlay").click(function() {
    $(".insert-box").fadeOut();
});

$("[data-toggle='datepicker']").datepicker({
    format: 'yyyy-mm-dd',
    weekStart: 1,
    autoHide: true
});