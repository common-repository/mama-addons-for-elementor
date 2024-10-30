<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Fancy_Box_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-fancy-box-widget';
  }

  public function get_title() {
    return 'Fancy Box';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'fancy_box_section',
      array(
        'label' => esc_html__('Fancy Box' , 'mama-elementor')
      )
    );

    $this->add_control(
      'bg_image',
      array(
        'label'     => esc_html__('Background Image', 'mama-elementor'),
        'type'      => Controls_Manager::MEDIA,
      )
    );

    $this->add_control(
      'sub_title',
      array(
        'label'       => esc_html__('Sub Title', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('Episode 1020', 'mama-elementor'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'title',
      array(
        'label'       => esc_html__('Title', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('Take control of your commute with Google Maps', 'mama-elementor'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'btn_text',
      array(
        'label'       => esc_html__('Button Text', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Listen on iTunes', 'mama-elementor'),
      )
    );

    $this->add_control(
      'btn_url',
      array(
        'label'       => esc_html__('Button URL', 'mama-elementor'),
        'type'        => Controls_Manager::URL,
        'label_block' => true,
        'default'     => array('url' => '#'),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_sub_title_color',
      array(
        'label' => esc_html__('Sub Title', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('sub_title_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-fancybox-subtitle' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'sub_title_typography',
        'selector' => '{{WRAPPER}} .mama-fancybox-subtitle',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_title_color',
      array(
        'label' => esc_html__('Title (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('title_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '' => '',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .mama-fancybox-title',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_button_style',
      array(
        'label' => esc_html__('Button (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->start_controls_tabs('button_style');

    $this->start_controls_tab(
      'button_style_normal',
      array(
        'label' => esc_html__('Normal', 'mama-elementor'),
      )
    );

    $this->add_control('button_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '' => '',
        ),
      )
    );

    $this->add_control('button_text_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '' => '',
        ),
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'button_style_hover',
      array(
        'label' => esc_html__('Hover', 'mama-elementor'),
      )
    );

    $this->add_control('button_bg_hover_color', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-fancybox.mama-style4:hover .mama-btn.mama-style3' => 'background-color: {{VALUE}}; border-color:{{VALUE}};',
        ),
      )
    );

    $this->add_control('button_text_hover_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-btn:hover' => 'color: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_tabs();

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
    $settings  = $this->get_settings();
    $bg_image  = $settings['bg_image'];
    $title     = $settings['title'];
    $sub_title = $settings['sub_title'];
    $btn_url   = $settings['btn_url'];
    $btn_text  = $settings['btn_text'];
    $href      = (!empty($btn_url['url']) ) ? $btn_url['url'] : '#';
    $target    = ($btn_url['is_external'] == 'on') ? '_blank' : '_self';

  ?>

    <div class="mama-fancybox mama-style4 mama-zoom">
      <div class="mama-fancybox-bg mama-bg mama-zoom-in1" style="background-image: url(<?php echo esc_url($bg_image['url']); ?>);"></div>
      <div class="mama-fancybox-info">
        <div class="mama-fancybox-text">
          <div class="mama-fancybox-subtitle mama-white-c mama-mt-5 mama-f12-lg text-uppercase"><?php echo esc_html($sub_title); ?></div>
          <h2 class="mama-fancybox-title mama-white-c mama-f21-lg mama-m0"><?php echo esc_html($title); ?></h2>
        </div>
        <div class="mama-fancybox-btn"><a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-style3"><?php echo esc_html($btn_text); ?></a></div>
      </div>
    </div>
  <?php

  }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Fancy_Box_Widget() );