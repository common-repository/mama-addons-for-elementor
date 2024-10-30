<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Review_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-review-widget';
    }

    public function get_title() {
        return 'Review';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'review_section',
            array(
                'label' => esc_html__('Review' , 'mama-elementor')
            )
        );

        $this->add_control(
            'image',
            array(
                'label'       => esc_html__('Image', 'mama-elementor'),
                'type'        => Controls_Manager::MEDIA,
                'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
                'label_block' => true,
            )
        );

        $this->add_control(
            'title',
            array(
                'label'       => esc_html__('Title', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('Excellent ICO', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $this->add_control(
            'comment',
            array(
                'label'       => esc_html__('Comment', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('Mama is an end-to-end solution for launching compliant security tokens.', 'mama-elementor'),
                'type'        => Controls_Manager::TEXTAREA,
            )
        );

        $this->add_control(
            'rating',
            array(
                'label'       => esc_html__('Rating Value', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__('4.7', 'mama-elementor'),
                'description' => esc_html__('Enter rating value in between 1 - 5', 'mama-elementor')
            )
        );

        $this->add_control(
            'stretch_image',
            array(
                'label'     => esc_html__('Stretch Image', 'mama-elementor'),
                'type'      => Controls_Manager::SWITCHER,
                'separator' => 'after',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style_title',
            array(
                'label' => esc_html__('Title', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('title_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mama-review-title' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .mama-review-title',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style_comment',
            array(
                'label' => esc_html__('Comment', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('comment_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mama-comment' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'comment_typography',
                'selector' => '{{WRAPPER}} .mama-comment',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style_icon',
            array(
                'label' => esc_html__('Icon', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('icon_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .mama-review-number span, {{WRAPPER}} .mama-review-wrap i, .mama-review-number' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings      = $this->get_settings();
        $image         = $settings['image'];
        $title         = $settings['title'];
        $comment       = $settings['comment'];
        $rating        = $settings['rating'];
        $stretch_image = $settings['stretch_image'];
        $style         = ($stretch_image) ? ' style="width:100%;"':'';
        if(empty($image['url'])) { return; }
        ?>

        <div class="mama-experts-review mama-box-shadow1">
            <div class="mama-experts-review-in">
                <?php if(!empty($image) && is_array($image) && !empty($image['url'])): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="image"<?php echo wp_kses_data($style); ?>>
                <?php endif; ?>
                <div class="mama-expert-comment">
                    <?php if(!empty($title)): ?>
                        <h3 class="mama-f14-lg mama-font-name mama-review-title mama-mb10"><?php echo esc_html($title); ?></h3>
                    <?php endif; ?>
                    <?php if(!empty($comment)): ?>
                        <div class="mama-comment"><?php echo wp_kses_post($comment); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(!empty($rating)): ?>
                <hr>
                <div class="mama-review-wrap">
                    <div class="mama-review mama-style1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <div class="mama-review-number"><span><?php echo esc_html($rating); ?>/</span>5</div>
                </div>
            <?php endif; ?>
        </div>

        <?php

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Review_Widget() );