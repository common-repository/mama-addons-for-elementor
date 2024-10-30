<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Contact_Details_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-contact-details-widget';
  }

  public function get_title() {
    return 'Contact Details';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'contact_details_section',
      array(
        'label' => esc_html__('Contact Details' , 'mama-elementor')
      )
    );

      $this->add_control(
          'icon',
          [
              'label' => __( 'Icon', 'text-domain' ),
              'type' => \Elementor\Controls_Manager::ICONS,
              'default' => [
                  'value' => 'fas fa-star',
                  'library' => 'solid',
              ],
          ]
      );

    $this->add_control(
      'title',
      array(
        'label'       => esc_html__('Title', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Event Location', 'mama-elementor')       
      )
    );

    $this->add_control(
      'details',
      array(
        'label'       => esc_html__('Details', 'mama-elementor'),
        'type'        => Controls_Manager::TEXTAREA,
        'label_block' => true,
        'default'     => '445 Mount Eden Road,arters Beach<br>Westport. Mount Eden, Auckland.'      
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_icon_color',
      array(
        'label' => esc_html__('Icon', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('icon_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          '{{WRAPPER}} .mama-contact-info i' => 'color: {{VALUE}};',
        ),
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
          '{{WRAPPER}} .mama-contact-title' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .mama-contact-title',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_details_color',
      array(
        'label' => esc_html__('Details', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('details_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          '{{WRAPPER}} .mama-contact-details' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'details_typography',
        'selector' => '{{WRAPPER}} .mama-contact-details',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();


  }

  protected function render() { 
    $settings = $this->get_settings();
    $title              = $settings['title'];
    $details            = $settings['details'];

  ?>
    <div class="mama-contact-info mama-style1 mama-border mama-radious-4 mama-white-bg mama-posi mama-relative">
      <div class="mama-location-icon mama-f16-lg">
          <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
      </div>
      <h3 class="mama-f18-lg mama-font-name mama-contact-title mama-mt-3 mama-mb5"><?php echo esc_html($title); ?></h3>
      <div class="mama-mb-6 mama-contact-details"><?php echo wp_kses_post($details); ?></div>
    </div>
   <?php
    
  }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Contact_Details_Widget() );