<?php
    /**
     * Type of custom post to collect
     * @var string
     */
    $post_type = 'post';
?>
        @if ($post_type)
            <?php

            $i = 0;
            //Query events according to shortcode
            $eventargs = array(
                    'post_type'      => $post_type,
                    'posts_per_page' => $posts_per_page,
                    'orderby'        => 'post_date',
                    'order'          => 'DESC',
            );

            if ( !is_null($include_categories) || $include_categories ) {
                $included_terms         = explode( ',', $include_categories );

                $eventargs['tax_query'] = array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'id',
                        'terms'    => $included_terms,
                        'operator' => 'IN',
                    ),
                );
            }

            global $wp_query;

            $temp_query = $wp_query;

            $wp_query = new WP_Query($eventargs);

            ?>


            @if($list_search_enabled == 'on')
            <div class="et_pb_search et_pb_module et_pb_bg_layout_light et_pb_text_align_left  et_pb_search_0">
                <form role="search" method="get" class="et_pb_searchform" action="/" _lpchecked="1">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="hidden" name="post_type" value="{{ $post_type }}" />
                        <input type="text" value="" name="s" class="et_pb_s" style="padding-right: 74px;">
                        <input type="submit" value="Search" class="et_pb_searchsubmit">
                    </div>
                </form>
            </div>
            @endif



<!-- section container -->
        <div class='blog-post-listing'>
            @while ($wp_query->have_posts())
                    <?php
                        //Set vars
                        $wp_query->the_post();
                        $url        = get_post_permalink();
                        $title      = get_the_title( );
                        $image      = wp_get_attachment_url( get_post_thumbnail_id() );
                        $i++;
                    ?>
<!-- make dynamic -->
            <div class=' et_pb_row et_pb_row_{{ $i }} et_pb_blurb et_pb_module et_pb_blurb_position_left'>
                <!-- noformat on -->
                <div class="et_pb_blurb_content clearfix">
                    @if($show_thumbnails == 'on')
                    <div class="et_pb_main_blurb_image">
                        <img src="{{ $image }}" alt="">
                    </div>
                    @endif
                    <div class="et_pb_blurb_container">
                        <h5><a href="{{ get_the_permalink() }}">{{ get_the_title() }}</a></h5>
                        <p class="post-meta"> <span class="published">{{ get_the_date() }}</span> | <span class="comments-number"><a href="{{ get_post_permalink() }}/#respond">{{ comments_number('0 Comments' ); }}</a></span></p>
                        <p>
                            @if($content_source == 'excerpt')
                            {{ get_the_excerpt(); }}
                            @endif

                            @if($content_source == 'content')
                            {{ get_the_content(); }}
                            @endif
                        </p>

                    </div>
                </div>
                <!-- noformat off -->
            </div>


             @endwhile
        </div>
			<?php $wp_query = $temp_query; ?>

    @endif
