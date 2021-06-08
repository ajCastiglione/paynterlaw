<div class="header-search">
    <form class="header-search__form" action="<?php echo get_home_url() ?>" method="get" role="search">
        <?php get_template_part('assets/search.svg') ?>
        <input type="search" name="s" placeholder="Search..." class="header-search__input">
        <p class="header-search__close"><?php get_template_part('assets/remove.svg') ?></p>
    </form>
    <div class="curtain"></div>
</div>