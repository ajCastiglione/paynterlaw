function tabChange($) {
    let tab = $(".tab");
    let content = $(".tab-content");

    tab.on("click", (e) => {
        let target = $(e.target);
        let tabContent = target.attr("data-tab");

        if (target.hasClass("active")) return;

        // Remove from current active class
        tab.removeClass("active");
        // Activate selected tab
        target.addClass("active");
        // Hide all content sections
        content.removeClass("active");
        // Show selected content section
        $(`#${tabContent}`).addClass("active");
    });
}

function mobileTabChange($) {
    let tab = $(".tab");
    let mobileTabs = $(".mobile-tabs");
    let content = $(".tab-content");

    mobileTabs.on("change", () => {
        let target = mobileTabs.val();
        let activeTab;
        $.each(tab, (idx, el) => {
            if ($(el).attr("data-tab") == target) {
                activeTab = $(el);
            }
            return null;
        });

        // Remove active from any other tab
        tab.removeClass("active");
        // Set tab to active in case of resizing
        activeTab.addClass("active");
        // Hide all content sections
        content.removeClass("active");
        // Show selected content section
        $(`#${target}`).addClass("active");
    });
}

jQuery(document).ready(function ($) {
    tabChange($);
    mobileTabChange($);
});
