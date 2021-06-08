function featuredArticles($) {
    let posts = $(".featured-articles__posts");
    let slickSettings = {
        infinite: true,
        slidesToShow: 1,
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
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                },
            },
        ],
    };

    posts.length > 0 ? posts.slick(slickSettings) : null;

    $(window).on("resize", function () {
        if (
            $(window).width() >= 768 &&
            $(window).width() < 1024 &&
            !posts.hasClass("slick-initialized")
        ) {
            posts.slick(slickSettings);
        }
    });
}

jQuery(document).ready(function ($) {
    featuredArticles($);
});
