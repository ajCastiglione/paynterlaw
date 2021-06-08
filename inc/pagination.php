<?php

function abt_pagination($query)
{

    echo '<div class="pagination">';

    echo paginate_links(array(
        'base'         => str_replace(999999999, '%#%', html_entity_decode(get_pagenum_link(999999999))),
        'total'        => $query->max_num_pages,
        'current'      => max(1, get_query_var('paged')),
        'format'       => '',
        'show_all'     => false,
        'type'         => 'list',
        'end_size'     => 2,
        'mid_size'     => 2,
        'prev_next'    => true,
        'prev_text'    => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="11.414" viewBox="0 0 16 11.414"><defs><style>.a{fill:none;stroke:#1b1b1b;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g transform="translate(-0.5 0.207)"><path class="a" d="M0,.5H15" transform="translate(0.5 5)"/><path class="a" d="M0,0,5,5,0,10" transform="translate(10.5 0.5)"/></g></svg>',
        'next_text'    => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="11.414" viewBox="0 0 16 11.414"><defs><style>.a{fill:none;stroke:#1b1b1b;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g transform="translate(-0.5 0.207)"><path class="a" d="M0,.5H15" transform="translate(0.5 5)"/><path class="a" d="M0,0,5,5,0,10" transform="translate(10.5 0.5)"/></g></svg>',
        'add_args'     => false,
    ));

    echo '</div>';
}
