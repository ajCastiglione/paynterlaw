function customSelectToggle($) {
    var container = $(".search__filters");
    var select = $(".search__mobile-list");
    var val = "";
    let initialVal = select.val(),
        initialState = 0;

    select.on("click", function (e) {
        container.toggleClass("active");
        let val = $(select).val();
        console.log(initialVal);
        if (initialVal == val && initialState > 0) {
            window.location = val;
        } else {
            initialState++;
        }
    });

    select.on("change", () => {
        val = $(select).val();
        if (val) {
            window.location = val;
        }
    });

    $(window).on("click", function (e) {
        const selectEl = document.querySelector(".search__mobile-list");
        if (!selectEl.contains(e.target)) {
            $(container).removeClass("active");
        }
    });
}

jQuery(document).ready(function ($) {
    customSelectToggle($);
});
