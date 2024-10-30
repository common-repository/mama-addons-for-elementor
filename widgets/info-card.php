<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Info_Card_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-info-card-widget';
    }

    public function get_title() {
        return 'Info Card';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'info_card_section',
            array(
                'label' => esc_html__('Info Card' , 'mama-elementor')
            )
        );

        $this->add_control(
            'title',
            array(
                'label'       => esc_html__('Title', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('Join the Community', 'mama-elementor')
            )
        );

        $this->add_control(
            'content',
            array(
                'label'       => esc_html__('Content', 'mama-elementor'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => 'Bring to the table win-win survival way to ensure proactive domination.'
            )
        );

        $this->add_control(
            'link_text',
            array(
                'label'       => esc_html__('Link Text', 'mama-elementor'),
                'default'     => esc_html('Learn More', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            )
        );

        $this->add_control(
            'link_url',
            array(
                'label'       => esc_html__('Link URL', 'mama-elementor'),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => array('url' => '#')
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_title_color',
            array(
                'label' => esc_html__('Title', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('title_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mama-info-title' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .mama-info-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_content_color',
            array(
                'label' => esc_html__('Content', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('content_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mama-info-content' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'content_typography',
                'selector' => '{{WRAPPER}} .mama-info-content',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_link_style',
            array(
                'label' => esc_html__('Link', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('link_style');

        $this->start_controls_tab(
            'link_style_normal',
            array(
                'label' => esc_html__('Normal', 'mama-elementor'),
            )
        );

        $this->add_control('link_text_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-info-link' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'link_style_hover',
            array(
                'label' => esc_html__('Hover', 'mama-elementor'),
            )
        );

        $this->add_control('link_text_hover_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-info-link:hover' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_tabs();

        $this->end_controls_section();


    }

    protected function render() {
        $settings = $this->get_settings();
        $link_url  = $settings['link_url'];
        $link_text = $settings['link_text'];
        $href      = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
        $target    = ($link_url['is_external'] == 'on') ? '_blank' : '_self';
        ?>
        <div class="mama-contact-card mama-style1 mama-border mama-radious-4 text-center">
            <div class="mama-contact-card-body">
                <h2 class="mama-contact-card-title mama-info-title mama-f18-lg mama-m0"><?php echo esc_html($settings['title']); ?></h2>
                <div class="mama-info-content"><?php echo wp_kses_post($settings['content']); ?> </div>
            </div>
            <?php if(!empty($link_text)): ?>
                <div class="mama-contact-card-footer mama-flex">
                    <a href="<?php echo esc_url($href); ?>" class="mama-info-link" target="<?php echo esc_attr($target); ?>"><?php echo esc_html($link_text); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <?php

    }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Info_Card_Widget() );