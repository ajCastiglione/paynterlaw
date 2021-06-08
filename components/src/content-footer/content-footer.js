function scrollTop($) {
    let btn = $("#scrollTop");
    let bod = $("html, body");
    btn.on("click", (e) => {
        e.preventDefault();
        bod.animate(
            {
                scrollTop: "0",
            },
            1000
        );
    });
}

jQuery(document).ready(function ($) {
    scrollTop($);
});
