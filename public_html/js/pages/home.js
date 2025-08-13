$(function(){

    $(window).on('scroll resize', function(){
        let scrollTop = $(this).scrollTop();

        $('.number').each(function (i) {
            let $self = $(this),
                top = $self.offset().top;

            if (scrollTop > top - 100) {
                $self.addClass('inactive');
            }
            else {
                $self.removeClass('inactive');
            }
        });
    });

});


