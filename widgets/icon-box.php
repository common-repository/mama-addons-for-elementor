<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Icon_Box_Widget extends Widget_Base {

  public function get_name() {
    return 'mama-icon-box-widget';
  }

  public function get_title() {
    return 'Icon Box';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'icon_box_section',
      array(
        'label' => esc_html__('Icon Box' , 'mama-elementor')
      )
    );

    $this->add_control(
      'style',
      array(
        'label'       => esc_html__('Style', 'mama-elementor'),
        'type'        => Controls_Manager::SELECT,
        'default'     => 'style1',
        'label_block' => true,
        'options' => array(
          'style1'  => 'Style 1',
          'style2'  => 'Style 2',
          'style3'  => 'Style 3',
          'style4'  => 'Style 4',
          'style5'  => 'Style 5',
          'style6'  => 'Style 6',
          'style7'  => 'Style 7',
          'style8'  => 'Style 8',
          'style9'  => 'Style 9',
          'style10' => 'Style 10',
        )
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
              'condition'   => array('style' => array('style1', 'style4', 'style5', 'style2', 'style8', 'style9', 'style10'))
          ]
      );

    $this->add_control(
      'image',
      array(
        'label'     => esc_html__('Icon Image', 'mama-elementor'),
        'type'      => Controls_Manager::MEDIA,
        'condition' => array('style' => array('style3', 'style6', 'style7'))       
      )
    );

    $this->add_control(
      'title',
      array(
        'label'       => esc_html__('Title', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'placeholder' => esc_html__('Enter your title', 'mama-elementor'),
        'default'     => esc_html__('Super Creative', 'mama-elementor'),
        'label_block' => true,
      )
    );

    $this->add_control(
      'description',
      array(
        'label'       => esc_html__('Description', 'mama-elementor'),
        'type'        => Controls_Manager::TEXTAREA,
        'placeholder' => esc_html__('Enter your description', 'mama-elementor'),
        'default'     => esc_html__('You can choose from 320+ icons and place it. All icons are pixel-perfect, hand-crafted & perfectly scalable. Awesome, eh?', 'mama-elementor'),
        'condition'   => array('style' => array('style1', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8', 'style9', 'style10')),
        'label_block' => true,
      )
    );

    $this->add_control(
      'link_text',
      array(
        'label'       => esc_html__('Link Text', 'mama-elementor'),
        'type'        => Controls_Manager::TEXT,
        'label_block' => true,
        'default'     => esc_html__('Learn More', 'mama-elementor'),
        'condition' => array('style' => array('style3', 'style4', 'style9'))
      )
    );

    $this->add_control(
      'link_url',
      array(
        'label'       => esc_html__('Link URL', 'mama-elementor'),
        'type'        => Controls_Manager::URL,
        'label_block' => true,
        'default'     => array('url' => '#'),
        'condition' => array('style' => array('style3', 'style4', 'style9'))
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
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-icon-box .mama-icon' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('icon_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'description' => esc_html__('This field is only for Style 6,8,9 & 10', 'mama-elementor'),
        'selectors' => array(
          '{{WRAPPER}} .mama-icon-box .mama-icon.mama-icon-bg' => 'background: {{VALUE}};',
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
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-icon-box .mama-iconbox-heading' => 'color: {{VALUE}};',
          '{{WRAPPER}} .mama-image-box.mama-style4 h3'       => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .mama-icon-box .mama-iconbox-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_description_color',
      array(
        'label' => esc_html__('Description', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('description_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-description-text' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'description_typography',
        'selector' => '{{WRAPPER}} .mama-description-text',
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
          '{{WRAPPER}} .mama-btn' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_border_color', 
      array(
        'label'       => esc_html__('Border Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-btn:before' => 'background: {{VALUE}};',
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
          '{{WRAPPER}} .mama-btn:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_control('link_border_color_hover', 
      array(
        'label'       => esc_html__('Border Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-btn:after' => 'background: {{VALUE}};',
        ),
      )
    );

    $this->end_controls_tabs();

    $this->end_controls_section();

    $this->start_controls_section('section_icon_box_bg_color',
      array(
        'label' => esc_html__('Icon Box', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('icon_box_bg_color', 
      array(
        'label'     => esc_html__('Background Color', 'mama-elementor'),
        'type'      => Controls_Manager::COLOR,
        'separator' => 'after',
        'selectors' => array(
          '{{WRAPPER}} .mama-icon-box.mama-style6.mama-with-bg-color' => 'background: {{VALUE}};',
        ),
      )
    );


    $this->end_controls_section();

  }

  protected function render() { 
    $settings           = $this->get_settings();
    $style              = $settings['style'];
    $title              = $settings['title'];
    $image              = $settings['image'];
    $description        = $settings['description'];
    $link_url           = $settings['link_url'];
    $link_text          = $settings['link_text'];
    $href               = (!empty($link_url['url']) ) ? $link_url['url'] : '#';
    $target             = ($link_url['is_external'] == 'on') ? '_blank' : '_self';

    switch ($style) {
      case 'style1': default: ?>
      <div class="mama-icon-box mama-style3 mama-mkt-green">
        <div class="mama-icon mama-icon-bg">
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </div>
        <?php if(!empty($title)): ?>
          <h3 class="mama-iconbox-heading mama-f18-lg mama-font-name mama-mt-4 mama-mb5"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>
        <?php if(!empty($description)): ?>
          <div class="mama-iconbox-text mama-description-text  mama-mb-6"><?php echo wp_kses_post($description); ?></div>
        <?php endif; ?>
      </div>
      
      <?php  
      break;

      case 'style2': ?>

        <div class="mama-icon-box mama-style2 text-center mama-box-shadow1">
          <div class="empty-space marg-lg-b35"></div>
          <div class="mama-icon mama-f48-lg mama-line1">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
          </div>
          <div class="empty-space marg-lg-b15"></div>
          <?php if(!empty($title)): ?>
            <div class="mama-line1-43 mama-iconbox-heading"><?php echo esc_html($title); ?></div>
            <div class="empty-space marg-lg-b30"></div>
          <?php endif; ?>
        </div>
        
        <?php
        break;

      case 'style3': ?>

        <div class="mama-icon-box mama-style3 mama-type1">
          <?php if(!empty($image) && is_array($image) && !empty($image['url'])): ?>
            <div class="mama-icon"><img src="<?php echo esc_url($image['url']); ?>" alt="img-icon"></div>
          <?php endif; ?>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-f18-lg mama-font-name mama-font-name mama-mt-3 mama-mb3"><?php echo esc_html($title); ?></h3>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-description-text  mama-line1-6 mama-mb8"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
          <?php if(!empty($link_text)): ?>
            <div class="mama-icon-box-btn mama-mb-6">
              <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-style2 mama-color7"><?php echo esc_html($link_text); ?><i class="fa fa-angle-right"></i></a>
            </div>
          <?php endif; ?>
        </div>
        <?php
        # code...
        break;

      case 'style4': ?>
        <div class="mama-icon-box mama-style4 mama-border text-center">
          <div class="mama-icon mama-f48-lg">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
          </div>
          <div class="empty-space marg-lg-b20"></div>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-font-name mama-f18-lg  mama-m0"><?php echo esc_html($title); ?></h3>
          <div class="empty-space marg-lg-b10"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-description-text mama-mb3"><?php echo wp_kses_post($description); ?></div>
            <div class="empty-space marg-lg-b20 marg-sm-b20"></div>
          <?php endif; ?>
          <?php if(!empty($link_text)): ?>
            <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-style1"><?php echo esc_html($link_text); ?></a>
          <?php endif; ?>
        </div>
        <?php
        break;

      case 'style5': ?>
        <div class="mama-icon-box mama-style5">
          <div class="mama-icon mama-f48-lg">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
          </div>
          <div class="empty-space marg-lg-b15"></div>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-f18-lg mama-font-name  mama-m0 mama-mt-3"><?php echo esc_html($title); ?></h3>
            <div class="empty-space marg-lg-b10"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-description-text mama-mb-6"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
        </div>
        <?php
        # code...
        break;

      case 'style6': ?>
        <div class="mama-icon-box mama-style7">
          <?php if(!empty($image) && is_array($image) && !empty($image['url'])): ?>
            <div class="mama-icon"><img src="<?php echo esc_url($image['url']); ?>" alt="icon"></div>
          <?php endif; ?>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-font-name mama-f18-lg  mama-m0 mama-mb-5"><?php echo esc_html($title); ?></h3>
            <div class="empty-space marg-lg-b20"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-iconbox-text mama-description-text  mama-mt-6 mama-mb-6"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
        </div>
        <?php
        # code...
        break;

      case 'style7': ?>
        <div class="mama-icon-box mama-style6 mama-with-bg-color text-center mama-radious-5 mama-font-lato ">
          <?php if(!empty($image) && is_array($image) && !empty($image['url'])): ?>
            <div class="mama-icon"><img src="<?php echo esc_url($image['url']); ?>" alt="icon"></div>
            <div class="empty-space marg-lg-b30"></div>
          <?php endif; ?>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-f18-lg  mama-white-c9 mama-mt-4 mama-mb-4 mama-font-libre-baskerville"><?php echo esc_html($title); ?></h3>
            <div class="empty-space marg-lg-b30"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-iconbox-text mama-f16-lg mama-description-text mama-line1-5  mama-white-c7 mama-mt-7 mama-mb-6"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
        </div>
        <?php
        break;

      case 'style8': ?>
        <div class="mama-icon-box mama-style8">
          <div class="mama-icon mama-f28-lg mama-icon-bg mama-flex mama-radious-50">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
          </div>
          <div class="empty-space marg-lg-b20"></div>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-font-open-sanse mama-f18-lg mama-mt-4 mama-mb-4"><?php echo esc_html($title); ?></h3>
            <div class="empty-space marg-lg-b15"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-iconbox-text mama-line1-6 mama-description-text mama-mt-6 mama-mb-6"><?php echo wp_kses_post($description); ?></div>
            <div class="empty-space marg-lg-b10"></div>
          <?php endif; ?>
        </div>
        <?php
        # code...
        break;
        


      ?>
        <div class="mama-hover-layer">
          <div class="hover-container mama-style3">
            <div class="mama-icon-box mama-style9 <?php echo esc_attr($uniqid_class); ?> mama-color1 mama-radious-5">
              <div class="mama-icon mama-f22-lg mama-radious-50 mama-icon-bg mama-flex">
                  <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
              </div>
              <div class="empty-space marg-lg-b15"></div>
              <?php if(!empty($title)): ?>
                <h3 class="mama-iconbox-heading mama-f18-lg mama-font-name mama-m0 mama-mt2"><?php echo esc_html($title); ?></h3>
                <div class="empty-space marg-lg-b5"></div>
              <?php endif; ?>
              <?php if(!empty($description)): ?>
                <div class="mama-iconbox-text">
                  <div class="mama-iconbox-text-in mama-description-text"><?php echo wp_kses_post($description); ?></div>
                </div>
              <?php endif; ?>
              <?php if(!empty($link_text)): ?>
                <div class="mama-icon-box-btn"><a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-style1"><?php echo esc_html($link_text); ?></a></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php
        # code...
        break;

      case 'style10': ?>
        <div class="mama-icon-box mama-style10 mama-color1">
          <div class="mama-icon mama-color1 mama-f22-lg mama-radious-50 mama-icon-bg mama-flex">
              <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
          </div>
          <div class="empty-space marg-lg-b10"></div>
          <?php if(!empty($title)): ?>
            <h3 class="mama-iconbox-heading mama-f18-lg mama-font-name mama-m0 mama-mt2"><?php echo esc_html($title); ?></h3>
            <div class="empty-space marg-lg-b5"></div>
          <?php endif; ?>
          <?php if(!empty($description)): ?>
            <div class="mama-iconbox-text mama-description-text"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
        </div>
        <?php
        # code...
        break;

    }
  }


}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Icon_Box_Widget() );