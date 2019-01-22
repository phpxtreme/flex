$(document).ready(function () {
    let form = $('#form'),
        card = $('.card'),
        info = $('.alert');

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    form.submit(function (events) {
        $.post('login', form.serialize())
            .done(function (data) {
                window.location.reload();
            })
            .fail(function (data) {
                card.effect('shake', {
                    times: 2,
                    distance: 12
                }, 'normal', function () {
                    info.removeAttr('hidden').html('<i class="fa fa-times-circle"></i> ' + data.responseJSON.message);
                });
            })
        events.preventDefault();
    })
})