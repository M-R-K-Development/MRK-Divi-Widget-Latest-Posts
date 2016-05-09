<?php
/**
 *
 * Latest Post Widget
 *
 */
class MrkDiviWidgetLatestPost extends DiviCustomWidget
{

    public function __construct($dir)
    {
        $this->config = array(
            'name' => 'Blog Post List',
            'slug' => 'mrk_divi_widget_latest_posts',
        );

        $this->addField(
            array(
                'title_text' => array(
                'label'           => __('Widget title', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => __('Title to display before the grid.', 'et_builder'),
                ),
            )
        );

        $this->addField(
                array(
                    'list_search_enabled' => array(
                        'label'             => 'Enable Search',
                        'type'              => 'yes_no_button',
                        'description'       => 'Show search form.',
                        'default'           => 'off',
                        ),
                )
        );

        $this->addField(
                array(
                    'posts_per_page' => array(
                                'label'           => 'Number of posts displayed',
                                'type'            => 'text',
                                'description'     => 'Enter the amount of posts to display',
                                'default'         => 10,
                        ),
                )
        );

        $this->addField(
                array(
                    'posts_offset' => array(
                                'label'           => 'Post Offset',
                                'type'            => 'text',
                                'description'     => 'Enter the offset number to display posts starting from that offset.',
                                'default'         => '0',
                        ),
                )
        );

        $this->addField(array(
                 'include_categories' => array(
                    'label'           => esc_html__( 'Include from only these categories', 'et_builder' ),
                    'renderer'        => 'et_builder_include_custom_categories_option',
                    'render_options'  => array('term_name' => 'category'),
                    'option_category' => 'basic_option',
                    'description'     => esc_html__( 'Select the categories that you would like to include in the feed.', 'et_builder' ),
                ),
      ));

        $this->addField(
                array(
                    'show_thumbnails' => array(
                                'label'             => 'Show thumbnails',
                                'type'              => 'yes_no_button',
                                'description'       => 'Show thumbnails on the list item.',
                                'default'           => 'on',
                        ),
                )
        );

        $this->addField(array(
            'content_source' => array(
                'label'             => esc_html__( 'Content Display', 'et_builder' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'excerpt'  => esc_html__( 'Show Excerpt', 'et_builder' ),
                    'content'  => esc_html__( 'Show Content', 'et_builder' ),
                    'none'     => esc_html__( 'Do not show content', 'et_builder' ),
                ),
                'description'       => esc_html__( 'Showing the full content will not truncate your posts. Showing the excerpt will only display excerpt text.', 'et_builder' ),
                'default'           => 'none',
            ), ));

        $this->addField(
                array(
                    'admin_label' => array(
                    'label'       => __('Admin Label', 'et_builder'),
                    'type'        => 'text',
                    'description' => __('This will change the label of the module in the builder for easy identification.', 'et_builder'),
                    ),
                )
            );

        parent::__construct($dir);
    }
}

new MrkDiviWidgetLatestPost($dir);
