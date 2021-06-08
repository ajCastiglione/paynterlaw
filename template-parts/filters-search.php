<?php
$searchUrl = get_home_url() . '/?s=' . get_search_query();
if (isset($_GET['filter'])) {
    $type = $_GET['filter'];
}
?>
<div class="search__filters">
    <ul class="search__filter-list">
        <li><a href="<?php echo $searchUrl ?>" class="<?php echo isset($type) ? '' : 'active' ?>">Everything</a></li>
        <li><a href="<?php echo $searchUrl . '&filter=cases' ?>" class="<?php echo $type == 'cases' ? 'active' : '' ?>">Service</a></li>
        <li><a href="<?php echo $searchUrl . '&filter=our-team' ?>" class="<?php echo $type == 'our-team' ? 'active' : '' ?>">Team</a></li>
        <li><a href="<?php echo $searchUrl . '&filter=post' ?>" class="<?php echo $type == 'post' ? 'active' : '' ?>">Article</a></li>
        <li><a href="<?php echo $searchUrl . '&filter=page' ?>" class="<?php echo $type == 'page' ? 'active' : '' ?>">Page</a></li>
    </ul>

    <div class="icon"><?php get_template_part('assets/down', 'arrow-sm.svg'); ?></div>
    <select name="filters" class="search__mobile-list">
        <option id="default" value="<?php echo $searchUrl ?>">Everything</option>
        <option value="<?php echo $searchUrl . '&filter=cases' ?>">Service</option>
        <option value="<?php echo $searchUrl . '&filter=our-team' ?>">Team</option>
        <option value="<?php echo $searchUrl . '&filter=post' ?>">Article</option>
        <option value="<?php echo $searchUrl . '&filter=page' ?>">Page</option>
    </select>
</div>