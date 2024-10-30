<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Image_Box_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-image-box-widget';
  }

  public function get_title() {
    return 'Image Box';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'image_box_section',
      array(
        'label' => esc_html__('Image Box' , 'mama-elementor')
      )
    );

    $this->add_control(
      'image',
      array(
        'label'       => esc_html__('Image', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
      )
    );

    $this->add_control(
      'title',
      array(
        'label'       => esc_html__('Title', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Super Creative', 'mama-elementor')       
      )
    );

    $this->add_control(
      'description',
      array(
        'label'       => esc_html__('Description', 'mama-elementor'),
        'type'        => Controls_Manager::TEXTAREA,
        'label_block' => true,
        'default'     => esc_html__('You can choose from 320+ icons and place it. All icons are pixel-perfect, hand-crafted & perfectly scalable. Awesome, eh?', 'mama-elementor')       
      )
    );

    $this->add_control(
      'link_text',
      array(
        'label'       => esc_html__('Link Text', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Learn More', 'mama-elementor')
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

    $this->start_controls_section('section_title_style',
      array(
        'label' => esc_html__('Title (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->start_controls_tabs('title_style');

    $this->start_controls_tab(
      'title_style_normal',
      array(
        'label' => esc_html__('Normal', 'mama-elementor'),
      )
    );

    $this->add_control('title_text_color', 
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
        'selector' => '',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'title_style_hover',
      array(
        'label' => esc_html__('Hover', 'mama-elementor'),
      )
    );

    $this->add_control('title_hover_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-image-box:hover .mama-image-box-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tabs();

    $this->end_controls_section();

    $this->start_controls_section('section_description_color',
      array(
        'label' => esc_html__('Description (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );



    $this->add_control('description_color', 
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
        'name'     => 'description_typography',
        'selector' => '',
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
          '{{WRAPPER}} .mama-image-box .mama-btn' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_border_color', 
      array(
        'label'       => esc_html__('Border Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-image-box .mama-btn:before' => 'background: {{VALUE}};',
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
          '{{WRAPPER}} .mama-image-box .mama-btn:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_border_color_hover', 
      array(
        'label'       => esc_html__('Border Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-image-box .mama-btn:after' => 'background: {{VALUE}};',
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
    $settings    = $this->get_settings();
    $title       = $settings['title'];
    $image       = $settings['image'];
    $description = $settings['description'];
    $link_url    = $settings['link_url'];
    $link_text   = $settings['link_text'];
    $href        = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target      = ($link_url['is_external'] == 'on') ? '_blank' : '_self';

  ?>

    <div class="mama-image-box mama-style4 mama-zoom mama-radious-4 mama-relative mama-border text-center">
      <?php if(!empty($image) && is_array($image) && !empty($image['url'])): ?>
        <div class="mama-image mama-overflow-hidden">
          <div class="mama-bg mama-zoom-in1" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
        </div>
      <?php endif; ?>
      <?php if(!empty($title) || !empty($description)): ?>
        <div class="empty-space marg-lg-b30"></div>
        <div class="mama-image-meta">
          <h3 class="mama-f18-lg mama-font-name mama-font-name mama-image-box-heading mama-mt-3 mama-mb-6"><?php echo esc_html($title); ?></h3>
          <div class="empty-space marg-lg-b20"></div>
          <div class=" mama-mt-5 mama-mb-6 mama-image-box-text mama-description-text"><?php echo wp_kses_post($description); ?></div>
        </div>
        <div class="empty-space marg-lg-b30"></div>
      <?php endif; ?>
      <?php if(!empty($link_text)): ?>
        <div class="mama-image-box-btn mama-mt-7">
          <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-style1"><?php echo esc_html($link_text); ?></a>
        </div>
        <div class="empty-space marg-lg-b30"></div>
      <?php endif; ?>
    </div>


   <?php
    
  }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Image_Box_Widget() );