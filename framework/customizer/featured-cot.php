<?php
// CREATE THE fcp PANEL
function forest_customize_register_fp( $wp_customize )
{
// CREATE THE fcp PANEL
    $wp_customize->add_panel('forest_a_fcp_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Posts Showcase', 'forest'),
        'description' => '',
    ));


    //SQUARE BOXES
    $wp_customize->add_section(
        'forest_a_fc_boxes',
        array(
            'title' => __('Square Boxes', 'forest'),
            'priority' => 10,
            'panel' => 'forest_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'forest_a_box_enable',
        array('sanitize_callback' => 'forest_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'forest_a_box_enable', array(
            'settings' => 'forest_a_box_enable',
            'label' => __('Enable Square Boxes & Posts Slider.', 'forest'),
            'section' => 'forest_a_fc_boxes',
            'type' => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'forest_a_box_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'forest_a_box_title', array(
            'settings' => 'forest_a_box_title',
            'label' => __('Title for the Boxes', 'forest'),
            'section' => 'forest_a_fc_boxes',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'forest_a_box_cat',
        array('sanitize_callback' => 'forest_sanitize_category')
    );

    $wp_customize->add_control(
        new Forest_WP_Customize_Category_Control(
            $wp_customize,
            'forest_a_box_cat',
            array(
                'label' => __('Posts Category.', 'forest'),
                'settings' => 'forest_a_box_cat',
                'section' => 'forest_a_fc_boxes'
            )
        )
    );


    //SLIDER
    $wp_customize->add_section(
        'forest_a_fc_slider',
        array(
            'title' => __('3D Cube Posts Slider', 'forest'),
            'priority' => 10,
            'panel' => 'forest_a_fcp_panel',
            'description' => 'This is the Posts Slider, displayed left to the square boxes.',
        )
    );


    $wp_customize->add_setting(
        'forest_a_slider_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'forest_a_slider_title', array(
            'settings' => 'forest_a_slider_title',
            'label' => __('Title for the Slider', 'forest'),
            'section' => 'forest_a_fc_slider',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'forest_a_slider_count',
        array('sanitize_callback' => 'forest_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'forest_a_slider_count', array(
            'settings' => 'forest_a_slider_count',
            'label' => __('No. of Posts(Min:3, Max: 10)', 'forest'),
            'section' => 'forest_a_fc_slider',
            'type' => 'range',
            'input_attrs' => array(
                'min' => 3,
                'max' => 10,
                'step' => 1,
                'class' => 'test-class test',
                'style' => 'color: #0a0',
            ),
        )
    );

    $wp_customize->add_setting(
        'forest_a_slider_cat',
        array('sanitize_callback' => 'forest_sanitize_category')
    );

    $wp_customize->add_control(
        new Forest_WP_Customize_Category_Control(
            $wp_customize,
            'forest_a_slider_cat',
            array(
                'label' => __('Category For Slider.', 'forest'),
                'settings' => 'forest_a_slider_cat',
                'section' => 'forest_a_fc_slider'
            )
        )
    );


    //COVERFLOW

    $wp_customize->add_section(
        'forest_a_fc_coverflow',
        array(
            'title' => __('Top CoverFlow Slider', 'forest'),
            'priority' => 5,
            'panel' => 'forest_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'forest_a_coverflow_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'forest_a_coverflow_title', array(
            'settings' => 'forest_a_coverflow_title',
            'label' => __('Title for the Coverflow', 'forest'),
            'section' => 'forest_a_fc_coverflow',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'forest_a_coverflow_enable',
        array('sanitize_callback' => 'forest_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'forest_a_coverflow_enable', array(
            'settings' => 'forest_a_coverflow_enable',
            'label' => __('Enable', 'forest'),
            'section' => 'forest_a_fc_coverflow',
            'type' => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'forest_a_coverflow_cat',
        array('sanitize_callback' => 'forest_sanitize_category')
    );


    $wp_customize->add_control(
        new Forest_WP_Customize_Category_Control(
            $wp_customize,
            'forest_a_coverflow_cat',
            array(
                'label' => __('Category For Image Grid', 'forest'),
                'settings' => 'forest_a_coverflow_cat',
                'section' => 'forest_a_fc_coverflow'
            )
        )
    );

    $wp_customize->add_setting(
        'forest_a_coverflow_pc',
        array('sanitize_callback' => 'forest_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'forest_a_coverflow_pc', array(
            'settings' => 'forest_a_coverflow_pc',
            'label' => __('Max No. of Posts in the Grid. Min: 5.', 'forest'),
            'section' => 'forest_a_fc_coverflow',
            'type' => 'number',
            'default' => '0'
        )
    );
}
add_action( 'customize_register', 'forest_customize_register_fp' );