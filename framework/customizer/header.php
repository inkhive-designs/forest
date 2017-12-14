<?php
function forest_customize_register_header_settings( $wp_customize ) {
    //Header Settings
    $wp_customize->add_panel('forest_header_panel', array(
        'title' => __('Header Settings', 'forest'),
        'priority' => 11,
    ));

    //Logo Settings
    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'forest' ),
        'priority'   => 30,
        'panel'     => 'forest_header_panel'
    ) );

    $wp_customize->add_setting( 'forest_logo_resize' , array(
        'default'     => 100,
        'sanitize_callback' => 'forest_sanitize_positive_number',
    ) );
    $wp_customize->add_control(
        'forest_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo','forest'),
            'section' => 'title_tagline',
            'settings' => 'forest_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'forest_logo_enabled',
            'input_attrs' => array(
                'min'   => 30,
                'max'   => 200,
                'step'  => 5,
            ),
        )
    );

    function forest_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }

    //Settings For Logo Area
    $wp_customize->add_setting(
        'forest_hide_title_tagline',
        array( 'sanitize_callback' => 'forest_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'forest_hide_title_tagline', array(
            'settings' => 'forest_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'forest' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    function forest_title_visible( $control ) {
        $option = $control->manager->get_setting('forest_hide_title_tagline');
        return $option->value() == false ;
    }
}
add_action( 'customize_register', 'forest_customize_register_header_settings' );