<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Road_Map_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-road-map-widget';
    }

    public function get_title() {
        return 'Road Map';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'road_map_section',
            array(
                'label' => esc_html__('Road Map' , 'mama-elementor')
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            array(
                'label'       => esc_html__('Icon', 'mama-elementor'),
                'label_block' => true,
                'type'        => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-exchange',
                    'library' => 'solid',
                ],
            )
        );

        $repeater->add_control(
            'title',
            array(
                'label'       => esc_html__('Title', 'mama-elementor'),
                'default'     => esc_html__('Your Title', 'mama-elementor'),
                'placeholder' => esc_html__('Enter your title here.', 'mama-elementor'),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT
            )
        );

        $repeater->add_control(
            'content',
            array(
                'label'       => esc_html__('Content', 'mama-elementor'),
                'default'     => esc_html__('Coming up with the genius idea and forming up the business', 'mama-elementor'),
                'placeholder' => esc_html__('Enter your content here.', 'mama-elementor'),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA
            )
        );

        $repeater->add_control(
            'date',
            array(
                'label'       => esc_html__('Date', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('December 2015', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'plans',
            array(
                'label'   => esc_html__('Plans', 'mama-elementor'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'icon'    => 'fa fa-exchange',
                        'title'   => esc_html__('Project Starts', 'mama-elementor'),
                        'content' => esc_html__('Coming up with the genius idea and forming up the business', 'mama-elementor'),
                        'date'    => esc_html__('December 2017', 'mama-elementor')
                    ),
                    array(
                        'icon'    => 'fa fa-exchange',
                        'title'   => esc_html__('Token Sale', 'mama-elementor'),
                        'content' => esc_html__('Coming up with the genius idea and forming up the business', 'mama-elementor'),
                        'date'    => esc_html__('November 2018', 'mama-elementor')
                    ),
                ),
                'title_field' => '<i class="{{ icon }}"></i> <span>{{ title }}</span>',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_road_map_style',
            array(
                'label' => esc_html__('Road Map', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('time_line_color',
            array(
                'label'       => esc_html__('Timeline Color (Pro)', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '' => '',
                    '' => '',
                ),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_icon_style',
            array(
                'label' => esc_html__('Icon (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('icon_style');

        $this->start_controls_tab(
            'icon_style_normal',
            array(
                'label' => esc_html__('Normal', 'mama-elementor'),
            )
        );

        $this->add_control('icon_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mama-roadmap.mama-color1 .mama-icon-box.mama-style2 .mama-icon' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_tab();


        $this->start_controls_tab(
            'icon_style_hover',
            array(
                'label' => esc_html__('Hover', 'mama-elementor'),
            )
        );

        $this->add_control('icon_color_hover',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mama-roadmap.mama-color1 .mama-icon-box.mama-style2 .mama-icon:hover' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section('section_title_style',
            array(
                'label' => esc_html__('Title (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('title_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '' => '',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'selector' => '',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_content_style',
            array(
                'label' => esc_html__('Content (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('content_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '' => '',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'content_typography',
                'selector' => '',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_date_style',
            array(
                'label' => esc_html__('Date', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('date_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'label_block' => true,
                'selectors' => array(
                    '{{WRAPPER}} .mama-box-time' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'date_typography',
                'selector' => '{{WRAPPER}} .mama-box-time',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'mama_section_pro',
            [
                'label' => __( '<span style="color: red">Go Pro for Working All Features</span>', 'mama-elementor')
            ]
          );
          
        $this->add_control(
        'mama_control_get_pro',
        [
            'label' => __( '<span> Get the  <a href="https://codenpy.com/item/mama-addons-for-elementor-page-builder-pro/" target="_blank">Pro version - $14</a> to unlock features.</span>', 'mama-elementor'),
            'type' => Controls_Manager::CHOOSE,
            'default' => '1',
            'description' => ''
        ]
        );
        
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $plans    = $settings['plans'];

        if(is_array($plans) && !empty($plans)):

            ?>

            <div class="mama-arrow-closest mama-poind-closest mama-slider mama-style1 mama-roadmap mama-color1">
                <div class="mama-overflow-hidden">
                    <div class="mama-slick-inner-pad-wrap">
                        <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">
                            <div class="slick-wrapper">

                                <?php foreach($plans as $plan): ?>
                                    <div class="slick-slide">
                                        <div class="mama-slick-inner-pad">
                                            <div class="mama-icon-box mama-style2 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.65s">
                                                <div class="mama-icon mama-f32-lg mama-mb10"><?php \Elementor\Icons_Manager::render_icon( $plan['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                                <h3 class="mama-f18-lg mama-roadmap-title mama-font-name mama-mb8 mama-font-name"><?php echo esc_html($plan['title']); ?></h3>
                                                <div class=" mama-roadmap-content mama-mb4"><?php echo wp_kses_post($plan['content']); ?></div>
                                                <div class="empty-space marg-lg-b30"></div>
                                                <div class="mama-box-time"><?php echo esc_html($plan['date']); ?></div>
                                            </div>
                                        </div>
                                    </div><!-- .slick-slide -->
                                <?php endforeach; ?>

                            </div>
                        </div><!-- .slick-container -->
                    </div>
                </div>
                <div class="pagination mama-style1 hidden"></div> <!-- If dont need Pagination then add class .hidden -->
                <div class="swipe-arrow mama-style1"> <!-- If dont need navigation then add class .mama-hidden -->
                    <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                    <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
                </div>
            </div><!-- .mama-carousor -->

        <?php endif;

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Road_Map_Widget() );