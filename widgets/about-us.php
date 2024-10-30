<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_About_Us_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-about-us-widget';
  }

  public function get_title() {
    return 'About Us';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_script_depends() {
    return array();
  }

  public function get_style_depends() {
    return array('');
  }

  public function get_categories() {
    return array('mama-elements');
  }


  protected function _register_controls() {
    $this->start_controls_section(
      'about_section',
      array(
        'label' => esc_html__('About Us' , 'mama-elementor')
      )
    );

    $this->add_control(
      'image',
      array(
        'label'       => esc_html__('Image', 'mama-elementor'),
        'type'        => Controls_Manager::MEDIA,
        'label_block' => true        
      )
    );

    $this->add_control(
      'sub_heading',
      array(
        'label'       => esc_html__('Sub Heading', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('OUR BRIEF HISTORY', 'mama-elementor'),
        'label_block' => true        
      )
    );

    $this->add_control(
      'heading',
      array(
        'label'       => esc_html__('Heading', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'default'     => esc_html__('Royal Bonanza Since 1976', 'mama-elementor'),
        'label_block' => true        
      )
    );

    $this->add_control(
      'content',
      array(
        'label'       => esc_html__('Content', 'mama-elementor'),
        'type'        => Controls_Manager::TEXTAREA,
        'default'     => esc_html__('Restaurants are popular in the area known as Le Midi. Oysters come from the Etang de Thau, to be served in the restaurants of Bouzigues, Meze, and Sète. Mussels are commonly seen here in addition.', 'mama-elementor'),
        'label_block' => true        
      )
    );

    $this->add_control(
      'award_images',
      array(
        'label'       => esc_html__('Award Images', 'mama-elementor'),
        'type'        => Controls_Manager::GALLERY,
        'label_block' => true        
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_style_sub_heading',
      array(
        'label' => esc_html__('Sub Heading', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('sub_heading_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-sub-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'sub_heading_typography',
        'selector' => '{{WRAPPER}} .mama-sub-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_style_heading',
      array(
        'label' => esc_html__('Heading', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('heading_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .mama-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_style_content',
      array(
        'label' => esc_html__('Content', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('content_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-about-content' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .mama-about-content',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();


  }

  protected function render() { 

    $settings     = $this->get_settings();
    $content      = $settings['content'];
    $sub_heading  = $settings['sub_heading'];
    $heading      = $settings['heading'];
    $award_images = $settings['award_images'];
    $image        = $settings['image'];

    $this->add_inline_editing_attributes('heading');
    $this->add_render_attribute('heading', 'class', 'mama-f36-lg mama-f25-sm mama-heading mama-font-name mama-m0');
    $this->add_inline_editing_attributes('sub_heading');
    $this->add_render_attribute('sub_heading', 'class', 'mama-f13-lg mama-line1-6 text-uppercase mama-sub-heading mama-spacing1 mama-mb2 mama-mt-5');
    $this->add_inline_editing_attributes('content');
    $this->add_render_attribute('content', 'class', 'text-center mama-f18-lg mama-about-content mama-f18-sm mama-line1-6');

  ?>

    <div class="mama-about mama-style1">
      <?php if(is_array($image) && !empty($image['url'])): ?>
        <div class="mama-about-img text-center"><img src="<?php echo esc_url($image['url']); ?>" alt="image"></div>
        <div class="empty-space marg-lg-b30"></div>
      <?php endif; ?>
      <div class="mama-section-heading mama-style2 text-center">
        <?php if(!empty($sub_heading)): ?>
          <div <?php echo $this->get_render_attribute_string('sub_heading'); ?> class="mama-f13-lg mama-line1-6 text-uppercase mama-sub-heading mama-spacing1 mama-mb2 mama-mt-5"><?php echo esc_html($sub_heading); ?></div>
          <div class="empty-space marg-lg-b5"></div>
        <?php endif; ?>
        <?php if(!empty($heading)): ?>
          <h2 <?php echo $this->get_render_attribute_string('heading'); ?> class="mama-f36-lg mama-f25-sm mama-heading mama-font-name mama-m0"><?php echo esc_html($heading); ?></h2>
          <div class="empty-space marg-lg-b20 marg-sm-b20"></div>
        <?php endif; ?> 
      </div>
      <?php if(!empty($content)): ?>
        <div <?php echo $this->get_render_attribute_string('content'); ?> class="text-center mama-f18-lg mama-about-content mama-f18-sm mama-line1-6"><?php echo wp_kses_post($content); ?></div>
      <?php endif; ?>
      <?php if(!empty($award_images) && is_array($award_images)): ?>
        <div class="empty-space marg-lg-b30 marg-sm-b30"></div>
        <div class="mama-awards mama-style1 mama-flex">
          <?php foreach($award_images as $image): ?>
            <div class="mama-award"><img src="<?php echo esc_url($image['url']); ?>" alt="award"></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

  <?php

  }

  protected function _content_template() { ?>

    <#
      var heading = settings.heading,
      subHeading  = settings.sub_heading,
      content     = settings.content,
      imageURL    = settings.image.url;

      view.addInlineEditingAttributes('heading');
      view.addInlineEditingAttributes('sub_heading', 'none');
      view.addInlineEditingAttributes('content', 'none');

      view.addRenderAttribute('heading',     'class', 'mama-f36-lg mama-f25-sm mama-heading mama-font-name mama-m0');
      view.addRenderAttribute('sub_heading', 'class', 'mama-f13-lg mama-line1-6 text-uppercase mama-sub-heading mama-spacing1 mama-mb2 mama-mt-5');
      view.addRenderAttribute('content',     'class', 'text-center mama-f18-lg mama-about-content mama-f18-sm mama-line1-6');
    #>

    <# if(settings.image.url != '') { #>
        <div class="mama-about-img text-center"><img src="{{{imageURL}}}" alt="image"></div>
        <div class="empty-space marg-lg-b30"></div>
      <# } #>
      <div class="mama-section-heading mama-style2 text-center">
        <# if(settings.sub_heading != '') { #>
          <div {{{ view.getRenderAttributeString('sub_heading') }}}>{{{subHeading}}}</div>
          <div class="empty-space marg-lg-b5"></div>
        <# } #>
        <# if(settings.heading != '') { #>
          <h2 {{{ view.getRenderAttributeString('heading') }}}>{{{heading}}}</h2>
          <div class="empty-space marg-lg-b20 marg-sm-b20"></div>
        <# } #> 
      </div>
      <# if(settings.content != '') { #>
        <div {{{ view.getRenderAttributeString('content') }}}>{{{content}}}</div>
      <# } #>
      <# if(settings.award_images != '') { #>
        <div class="empty-space marg-lg-b30 marg-sm-b30"></div>
        <div class="mama-awards mama-style1 mama-flex">
          <# settings.award_images.forEach(function(image) { #>
            <div class="mama-award"><img src="{{{image.url}}}" alt="award"></div>
          <# }) #>
        </div>
      <# } #>
    </div>
  <?php

  }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_About_Us_Widget() );