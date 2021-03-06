// Masonry source: https://css-tricks.com/piecing-together-approaches-for-a-css-masonry-layout/#article-header-id-5
function resizeTestimonialGrid($) {
    function resizeGridItem(item) {
        grid = document.getElementsByClassName(
            "testimonial-cards__container"
        )[0];
        rowHeight = parseInt(
            window.getComputedStyle(grid).getPropertyValue("grid-auto-rows")
        );
        rowGap = parseInt(
            window.getComputedStyle(grid).getPropertyValue("grid-row-gap")
        );
        rowSpan = Math.ceil(
            (item.querySelector(".inner").getBoundingClientRect().height +
                rowGap) /
                (rowHeight + rowGap)
        );
        item.style.gridRowEnd = "span " + rowSpan;
    }

    function resizeAllGridItems() {
        allItems = document.getElementsByClassName("testimonial-cards__single");
        for (x = 0; x < allItems.length; x++) {
            resizeGridItem(allItems[x]);
        }
    }

    window.onload = resizeAllGridItems();
    window.addEventListener("resize", resizeAllGridItems);
}

jQuery(document).ready(function ($) {
    resizeTestimonialGrid($);
});
