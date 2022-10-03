$(document).ready(function() {

    $('.user-form-btn').bind('click', function(e) {
        e.preventDefault()

        let form = $(this).closest('form')
        let url = form.attr('action')

        $.ajax(url, {
            type: 'POST',
            data: new FormData(form[0]),
            processData: false,
            contentType: false,

            success: function(data) {
                data = JSON.parse(data)

                if (data.status) {
                    $('section.form').addClass('d-none')
                    $('section.success').removeClass('d-none')
                }

                if (!data.status) {
                    let errors = $('.errors')
                    errors.html('')

                    data.errors.forEach(error => {
                        errors.append(`<p>${error}</p>`)
                    })
                }
            },
        })
    })

})