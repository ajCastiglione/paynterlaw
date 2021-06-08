function practiceCards($) {
    let cards = $(".practice-area__cards");
    let slickSettings = {
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 1023,
                settings: "unslick",
            },
            {
                breakpoint: 1,
                settings: "unslick",
            },
            {
                breakpoint: 767,
                settings: {
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                },
            },
        ],
    };

    cards.length > 0 ? cards.slick(slickSettings) : null;

    $(window).on("resize", function () {
        if (
            $(window).width() >= 768 &&
            $(window).width() < 1024 &&
            !cards.hasClass("slick-initialized")
        ) {
            cards.slick(slickSettings);
        }
    });
}

jQuery(document).ready(function ($) {
    practiceCards($);
});
