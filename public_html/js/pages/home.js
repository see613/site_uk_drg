$(function(){
    let topRate = .3,
        bottomRate = .3;

    updateNumbers();

    $(window).on('scroll resize', function(){
        updateNumbers();
    });


    function updateNumbers() {
        let windowH = $(window).height(),
            topSectionTop = windowH * topRate,
            bottomSectionTop = windowH * (1 - bottomRate),
            scrollTop = $(this).scrollTop();

        $('.number').each(function (i) {
            let $self = $(this),
                $inner = $self.find('>div'),
                top = $self.offset().top;

            if (top < scrollTop + topSectionTop) {
                let rate = Math.max(0, Math.min(1, (top - scrollTop) / topSectionTop));

                $self.css({
                    height: 130 * rate
                });
                $inner.css({
                    marginTop: 130 * (1 - rate)
                });
            }
            /*else if (top > scrollTop + bottomSectionTop) {
                let rate = Math.max(0, Math.min(1, (top - (scrollTop + bottomSectionTop)) / (windowH - bottomSectionTop)));

                $self.css({
                    height: 130 * (1 - rate)
                });
                $inner.css({
                    marginTop: -130 * rate
                });
            }*/
            else {
                $self.css({
                    height: 130
                });
                $inner.css({
                    marginTop: 0,
                    marginBottom: 0
                });
            }
        });
    }

});


