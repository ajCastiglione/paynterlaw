<div class="search__form-container">
    <form class="search__form" action="<?php echo get_home_url() ?>" method="get" role="search">
        <label for="search-input" class="search__label">Search</label>
        <?php get_template_part('assets/search.svg') ?>
        <input type="search" name="s" placeholder="Search..." class="search__input" id="search-input">
    </form>
</div>