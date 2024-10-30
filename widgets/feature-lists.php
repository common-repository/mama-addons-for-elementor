<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Feature_Lists_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-feature-lists-widget';
  }

  public function get_title() {
    return 'Feature Lists';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'feature_lists_section',
      array(
        'label' => esc_html__('Feature List' , 'mama-elementor')
      )
    );

    $repeater = new Repeater();

    $repeater->add_control(
      'image',
      array(
        'label'       => esc_html__('Icon', 'mama-elementor'),
        'type'        => Controls_Manager::MEDIA,
        'label_block' => true,
      )
    );

    $repeater->add_control(
      'list',
      array(
        'label'       => esc_html__('List', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('Secure like Forte', 'mama-elementor'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'lists',
      array(
        'label'   => esc_html__('Lists', 'mama-elementor'),
        'type'    => Controls_Manager::REPEATER,
        'fields'  => $repeater->get_controls(),
        'default' => array(
          array(
            'list'  => esc_html__('Secure like Forte', 'mama-elementor'),
          ),
        ),
        'title_field' => '<span>{{ list }}</span>',
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_style_lists',
      array(
        'label' => esc_html__('Lists', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('lists_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator'   => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-feature-list' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'      => 'lists_typography',
        'selector'  => '{{WRAPPER}} .mama-feature-list',
        'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->add_responsive_control(
      'lists_margin',
      array(
        'label'      => esc_html__('Margin', 'mama-elementor'),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array('px', 'em', '%'),
        'selectors' => array(
          '{{WRAPPER}} .mama-feature-list li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
        'separator' => 'before',
      )
    );

    $this->end_controls_section();

  }

  protected function render() { 

    $settings = $this->get_settings(); 
    $lists    = $settings['lists'];

    if(is_array($lists) && !empty($lists)):
  ?>

    <div class="mama-vertical-middle">
      <ul class="mama-feature-list mama-mp0 mama-f18-lg  mama-line1-5 mama-black111-c">
        <?php foreach($lists as $list): ?>
          <li>
            <?php if(!empty($list['image']['url'])): ?>
              <img src="<?php echo esc_url($list['image']['url']); ?>" alt="list-img">
            <?php endif; ?>
            <?php echo esc_html($list['list']); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php
    endif;

  }
}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Feature_Lists_Widget() );