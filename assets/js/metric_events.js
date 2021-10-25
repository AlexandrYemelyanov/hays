jQuery(function($) {
    var yaCounter = window.yaCounter52714453
    var ga = window.ga

    $(document).on('mailsent.wpcf7', function (e) {
        var $form = $(e.target)
        var id = $form.attr('id')

        // обратная связь || id 2400
        if (id === 'wpcf7-f2400-o39') {
            yaCounter.reachGoal('contactForm')
            ga('send', 'event', {
                eventCategory: 'submissions',
                eventAction: 'contactFormSubmit',
                eventLabel: 'Contact Form'
            })
        }

        console.log(id)
    })
})