// Header search
function searchOverlay($) {
    let curtain = $(".curtain");
    let adminBar =
        $("#wpadminbar").length > 0 ? $("#wpadminbar").outerHeight() : 0;
    let search = $(".header-search").outerHeight();
    // Account for inaccurate sized home header
    let topHeader = $("body").hasClass("home")
        ? $(".menus").outerHeight() + 32
        : $("#masthead").outerHeight() - 7;
    let alert = $(".alert").outerHeight();
    // Add up all the heights of the elements to determine how much height to substract
    const curtainHeight = Math.floor(search + topHeader + alert + adminBar);
    // Apply the correct height to the curtain
    curtain.css("height", `calc(100vh - ${curtainHeight}px)`);
}

// Nav sect
function searchToggle($) {
    var searchIcon = $("#search_icon");
    var closeBtn = $(".header-search__close");
    var searchField = $(".header-search");
    var site = $("body");

    searchIcon.on("click", function () {
        searchField.toggleClass("active");
        site.toggleClass("search-active");
    });
    closeBtn.on("click", function () {
        searchField.removeClass("active");
        site.removeClass("search-active");
    });
}

// Append down arrow to menu item w/ Children
function menuChildArrowAppend($) {
    let menu = $("#primary-menu");
    let li = menu.find(".menu-item-has-children");
    $.each(li, (idx, el) => {
        let text = $(el).text();
        $(el).find('a').first().append(
            '<svg  xmlns="http://www.w3.org/2000/svg" width="9.474" height="6.039" viewBox="0 0 9.474 6.039"><defs><style>.a{isolation:isolate;}.b{fill:none;stroke:#fff;stroke-linejoin:round;stroke-width:2px;}</style></defs><g class="a" transform="translate(0.237 -2.824)"><path class="b" d="M.5,3.5l4,4.364L8.5,3.5" transform="translate(0 0)"/></g></svg>'
        );
    });
}

function mobileNav($) {
    var navShowBtn = $(".hamburger");
    var navHideBtn = $("#close-nav");
    var body = $("body");
    var nav = $("#mobile-nav");

    navShowBtn.on("click", function (e) {
        nav.addClass("active");
        body.addClass("mobile-nav-active");
    });

    navHideBtn.on("click", function (e) {
        nav.removeClass("active");
        body.removeClass("mobile-nav-active");
    });
}

// Hero select field
function customSelectToggle($) {
    var select = $(".hero__options");
    var container = $(".hero__select-container");
    var val = "";
    select.on("click", function () {
        container.toggleClass("active");
        val = $(select).val();
        if (val) {
            window.location = val;
        }
    });
    select.on("change", function () {
        container.toggleClass("active");
        val = $(select).val();
        if (val) {
            window.location = val;
        }
    });

    $(window).on("click", function (e) {
        const selectEl = document.querySelector(".hero__options");
        if (!selectEl.contains(e.target)) {
            $(container).removeClass("active");
        }
    });
    $(window).on("load", (e) => {
        // Clears select field if hitting back-button
        select.val("");
    });
}

// Mega menus
function showPostInfo($) {
    // Reveal post preview - Desktop mega menu
    let li = $(".sub-menu .sub-nav-items li");
    li.on("mouseover", (e) => {
        let ID = e.target.id || $(e.target).parent().attr("id");
        let content = $(`div[data-sibling=${ID}]`);
        $(".sub-menu-page-info-content").removeClass("active");
        $(content).addClass("active");
    });
    // Hide post previews - Desktop mega menu
    let mainLi = $(".main-menu-item");
    mainLi.on("mouseover", (e) => {
        if ($(e.target).closest(".sub-menu").length == 0) {
            $(".sub-menu-page-info-content").removeClass("active");
        }
    });

    // Mobile mega menu
    let mobileLi = $(
        "#mobile-nav .menu li.main-menu-item.menu-item-has-children"
    );
    mobileLi.append(
        '<span class=\'sub-menu-expand-arrow\'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="11.414" viewBox="0 0 16 11.414"><defs><style>.a{fill:none;stroke:#1b1b1b;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g transform="translate(-0.5 0.207)"><path class="a" d="M0,.5H15" transform="translate(0.5 5)"/><path class="a" d="M0,0,5,5,0,10" transform="translate(10.5 0.5)"/></g></svg></span>'
    );
    let mobileLiExpand = $(".sub-menu-expand-arrow");
    let mobileNav = $(".mobile-navigation .menu-main-menu-container");
    let returnArrow = $(".sub-menu-return-arrow");

    mobileLiExpand.on("click", (e) => {
        e.preventDefault();
        let ID = $(e.target).is("span")
            ? $(e.target).parent().attr("id")
            : $(e.target).parentsUntil("li").parent().attr("id");
        let content = $(`div[data-sibling=${ID}]`);
        $(".sub-menu-page-info-content").removeClass("active");
        $(content).addClass("active");
        mobileNav.toggleClass("child-active");
    });

    returnArrow.on("click", (e) => {
        mobileNav.removeClass("child-active");
        $(".sub-menu-page-info-content").removeClass("active");
    });
}

function scrollToFormOnErr($) {
    if ($(".gform_wrapper.gform_validation_error").length > 0) {
        form = $(".gform_wrapper.gform_validation_error");
        $("html, body").animate(
            {
                scrollTop: form.offset().top - 40,
            },
            1000
        );
    }
}

jQuery(document).ready(function ($) {
    searchToggle($);
    mobileNav($);
    showPostInfo($);
    searchOverlay($);
    scrollToFormOnErr($);
    menuChildArrowAppend($);
    if ($("body").hasClass("home")) {
        customSelectToggle($);
    }
});
