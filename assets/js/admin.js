$("#login_form").submit(function (e) {
    e.preventDefault();

    var formElement = $(this);

    $.ajax({

        type: "POST",
        url: base_url + '/admin/login',
        dataType: "json",
        data: formElement.serialize(),
        success: function (response) {

            if (response.success) {

                window.location = base_url + 'admin';

            } else {

                formElement.addClass('invalid');
                setTimeout(function () {
                    formElement.removeClass('invalid');
                }, 500);

            }

        }

    });
});