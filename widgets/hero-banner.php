<?php 
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Hero_Banner extends Widget_Base {

  public function get_name() {
    return 'mama-hero-banner';
  }

  public function get_title() {
    return 'Hero Banner';
  }

  public function get_icon() {
    return 'fab fa-meetup';
  }

  public function get_categories() {
    return array('mama-elements');
  }

  public function get_form_id() {
    global $wpdb;

    $db_cf7froms  = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'wpcf7_contact_form'");
    $cf7_forms    = array();

    if ( $db_cf7froms ) {

      foreach ( $db_cf7froms as $cform ) {
        $cf7_forms[$cform->post_title] = $cform->ID;
      }

    } else {
      $cf7_forms['No contact forms found'] = 0;
    }

    return $cf7_forms;
  }

  protected function _register_controls() {
    $this->start_controls_section(
      'hero_banner_section',
      array(
        'label' => esc_html__('Hero Banner' , 'mama-elementor')
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
          'style1' => 'Style 1',
          'style2' => 'Style 2',
          'style3' => 'Style 3',
          'style4' => 'Style 4',
          'style5' => 'Style 5',
          'style6' => 'Style 6',
          'style7' => 'Style 7',
          'style8' => 'Style 8',
          'style9' => 'Style 9',
        )
      )
    );

    $this->add_control(
      'bg_image',
      array(
        'label'       => esc_html__('Image', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::MEDIA,
        'default'     => array('url' => \Elementor\Utils::get_placeholder_image_src()),
        'condition'   => array('style' => array('style2', 'style3', 'style4', 'style5', 'style7', 'style8', 'style9'))    
      )
    );

    $this->add_control(
      'overlay',
      array(
        'label'     => esc_html__('Overlay', 'mama-elementor'),
        'type'      => Controls_Manager::SWITCHER,
        'default'   => 'yes',
        'separator' => 'after',
        'condition' => array('style' => array('style4', 'style9')),
      )
    );

    $this->add_control(
      'heading',
      array(
        'label'       => esc_html__('Heading', 'mama-elementor'),
        'default'     => 'Make it professional.<br>Make it beautiful.',
        'label_block' => true,
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->add_control(
      'description',
      array(
        'label'       => esc_html__('Description', 'mama-elementor'),
        'default'     => 'We design digital platforms that elevate the customer experience <br>for the world\'s most beloved brands.',
        'label_block' => true,
        'type'        => Controls_Manager::TEXTAREA
      )
    );

    $this->add_control(
      'client_images',
      array(
        'label'       => esc_html__('Client Images', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::GALLERY,
        'condition'   => array('style' => array('style5'))    
      )
    );

    $this->add_control(
      'button_style',
      array(
        'label'       => esc_html__('Button Style', 'mama-elementor'),
        'type'        => Controls_Manager::SELECT,
        'default'     => '',
        'label_block' => true,
        'options'     => array(
          ''          => 'Choose Button Style',
          'mama-style3' => 'Style 1',
          'mama-style5' => 'Style 2',
        ),
        'condition'   => array('style' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style8', 'style9')),
      )
    );

    $this->add_control(
      'btn_text',
      array(
        'label'       => esc_html__('Button Text', 'mama-elementor'),
        'default'     => esc_html__('Button Text.', 'mama-elementor'),
        'label_block' => true,
        'condition'   => array('style' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style8', 'style9')),    
        'type'        => Controls_Manager::TEXT
      )
    );

    $this->add_control(
      'btn_link',
      array(
        'label'       => esc_html__('Button Link', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::URL,
        'condition'   => array('style' => array('style1', 'style3', 'style5', 'style7', 'style8', 'style9')),  
        'placeholder' => esc_html__('https://your-link.com', 'mama-elementor'),
      )
    );

    $this->add_control(
      'form',
      array(
        'label'       => esc_html__('Form', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::HEADING,
        'separator'   => 'before',
        'condition'   => array('style' => array('style3'))
      )
    );


    $this->add_control(
      'form_heading',
      array(
        'label'       => esc_html__('Heading', 'mama-elementor'),
        'default'     => esc_html__('Make an Appointment', 'mama-elementor'),
        'separator'   => 'before',
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
        'condition'   => array('style' => array('style3'))
      )
    );

    $this->add_control(
      'form_sub_heading',
      array(
        'label'       => esc_html__('Sub Heading', 'mama-elementor'),
        'default'     => esc_html__('Fill-out the details for imformation', 'mama-elementor'),
        'label_block' => true,
        'type'        => Controls_Manager::TEXT,
        'condition'   => array('style' => array('style3'))
      )
    );

    $this->add_control(
      'form_id',
      array(
        'label'       => esc_html__('Contact Form', 'mama-elementor'),
        'type'        => Controls_Manager::SELECT,
        'default'     => '',
        'label_block' => true,
        'condition'   => array('style' => array('style3')),
        'description' => esc_html__('Choose previously created contact form from the drop down list.', 'mama-elementor'),
        'options'     => array('' => 'Select Contact Form') + array_flip($this->get_form_id()),
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_bg_style',
      array(
        'label' => esc_html__('Background (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_group_control(
      Group_Control_Background::get_type(),
      array(
        'name'     => 'background',
        'label'    => esc_html__( 'Background', 'mama-elementor'),
        'types'    => array('classic', 'gradient'),
        'selector' => '',
      )
    );

    $this->end_controls_section();


    $this->end_controls_section();

    $this->start_controls_section('section_heading_style',
      array(
        'label' => esc_html__('Heading (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('heading_color', 
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
        'name'     => 'heading_typography',
        'selector' => '{{WRAPPER}} .mama-text-slider',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_description_style',
      array(
        'label' => esc_html__('Description', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('description_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          '{{WRAPPER}} .mama-hero-subtitle' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'description_typography',
        'selector' => '{{WRAPPER}} .mama-hero-subtitle',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_shape_style',
      array(
        'label' => esc_html__('Shape (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('shape_color_1', 
      array(
        'label'       => esc_html__('Color 1', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          ''  => '',
          '' => '',
        ),
      )
    );

    $this->add_control('shape_color_2', 
      array(
        'label'       => esc_html__('Color 2', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          '' => '',
           ''  => '',
        ),
      )
    );

    $this->add_control('shape_color_3', 
      array(
        'label'       => esc_html__('Color 3', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'label_block' => true,
        'selectors' => array(
          '' => '',
          '' => '',
          '' => '',
        ),
      )
    );

    $this->end_controls_section();


    $this->start_controls_section('section_button_style',
      array(
        'label' => esc_html__('Button', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->start_controls_tabs('btn_style');

    $this->start_controls_tab(
      'btn_style_normal',
      array(
        'label' => esc_html__('Normal', 'mama-elementor'),
      )
    );

    $this->add_control('btn_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .mama-hero-btn .mama-btn,
           {{WRAPPER}} .mama-subscribe-btn' => 'background-color: {{VALUE}};',
          '{{WRAPPER}} .mama-subscribe-btn' => 'border-color: {{VALUE}};',

        ),
      )
    );

    $this->add_control('btn_text_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .mama-hero-btn .mama-btn,
           {{WRAPPER}} .mama-subscribe-btn' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'btn_typography',
        'selector' => '{{WRAPPER}} .mama-hero-btn .mama-btn, {{WRAPPER}} .mama-subscribe-btn',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'btn_style_hover',
      array(
        'label' => esc_html__('Hover', 'mama-elementor'),
      )
    );

    $this->add_control('btn_bg_color_hover', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .mama-hero-btn .mama-btn:hover,
           {{WRAPPER}} .mama-subscribe-btn:hover' => 'background-color: {{VALUE}};',
          '{{WRAPPER}} .mama-subscribe-btn:hover' => 'border-color: {{VALUE}};',
        ),
      )
    );


    $this->add_control('btn_text_color_hover', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .mama-hero-btn .mama-btn:hover,
           {{WRAPPER}} .mama-subscribe-btn:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'btn_typography_hover',
        'selector' => '{{WRAPPER}} .mama-hero-btn .mama-btn:hover, {{WRAPPER}} .mama-subscribe-btn:hover',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tabs();

    $this->end_controls_section();



    $this->start_controls_section('section_form_heading_style',
      array(
        'label' => esc_html__('Form Heading (Pro)', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('form_heading_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '' => '',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'form_heading_typography',
        'selector' => '{{WRAPPER}} .mama-form-heading h2',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();

    $this->start_controls_section('section_form_sub_heading_style',
      array(
        'label' => esc_html__('Form Sub Heading', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->add_control('form_sub_heading_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .mama-form-sub-heading' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'form_sub_heading_typography',
        'selector' => '{{WRAPPER}} .mama-form-sub-heading',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_section();




    $this->start_controls_section('section_form_button_style',
      array(
        'label' => esc_html__('Form Button', 'mama-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
      )
    );

    $this->start_controls_tabs('form_btn_style');

    $this->start_controls_tab(
      'form_btn_style_normal',
      array(
        'label' => esc_html__('Normal', 'mama-elementor'),
      )
    );

    $this->add_control('form_btn_bg_color', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .wpcf7-submit' => 'background-color: {{VALUE}};',

        ),
      )
    );

    $this->add_control('form_btn_text_color', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .wpcf7-submit' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'form_btn_typography',
        'selector' => '{{WRAPPER}} .wpcf7-submit',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
      )
    );

    $this->end_controls_tab();


    $this->start_controls_tab(
      'form_btn_style_hover',
      array(
        'label' => esc_html__('Hover', 'mama-elementor'),
      )
    );

    $this->add_control('form_btn_bg_color_hover', 
      array(
        'label'       => esc_html__('Background Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .wpcf7-submit:hover' => 'background-color: {{VALUE}};',
        ),
      )
    );


    $this->add_control('form_btn_text_color_hover', 
      array(
        'label'       => esc_html__('Color', 'mama-elementor'),
        'type'        => Controls_Manager::COLOR,
        'selectors' => array(
          '{{WRAPPER}} .wpcf7-submit:hover' => 'color: {{VALUE}};',
        ),
      )
    );

    $this->add_group_control(
      Group_Control_Typography::get_type(),
      array(
        'name'     => 'form_btn_typography_hover',
        'selector' => '{{WRAPPER}} .wpcf7-submit:hover',
        'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
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
    $settings         = $this->get_settings_for_display();
    $style            = $settings['style'];
    $heading          = $settings['heading'];
    $description      = $settings['description'];
    $form_heading     = $settings['form_heading'];
    $form_sub_heading = $settings['form_sub_heading'];
    $form_id          = $settings['form_id'];
    $btn_text         = $settings['btn_text'];
    $btn_link         = $settings['btn_link'];
    $bg_image         = $settings['bg_image'];
    $overlay          = $settings['overlay'];
    $button_style     = $settings['button_style'];
    $client_images    = $settings['client_images'];
    $href             = (!empty($btn_link['url']) ) ? $btn_link['url'] : '#';
    $target           = ($btn_link['is_external'] == 'on') ? '_blank' : '_self';
    $overlay          = ($overlay == 'yes') ? 'has-overlay':'no-overlay';


    switch ($style) {
      case 'style1': default: ?>
        <div class="mama-hero mama-style5 mama-flex text-center">
          <div id="mama-ball-wrap"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <?php if(!empty($heading)): ?>
                  <h1 class="mama-text-slider mama-f60-lg mama-f40-sm mama-line1 mama-font-name mama-font-name mama-mt-6 mama-mb-9 mama-mt-5-sm mama-mb-3-sm"><?php echo wp_kses_post($heading); ?></h1>
                  <div class="empty-space marg-lg-b30"></div>
                <?php endif; ?>
                <?php if(!empty($description)): ?>
                  <div class="mama-hero-subtitle mama-f18-lg mama-line1-6 mama-mt-5 mama-mb-5"><?php echo wp_kses_post($description); ?></div>
                  <div class="empty-space marg-lg-b40"></div>
                <?php endif; ?>
                <?php if(!empty($btn_text)): ?>
                  <div class="mama-hero-btn">
                    <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style4'; ?> mama-color2"><?php echo esc_html($btn_text); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php
       # code...
       break;


      case 'style2': 

      $heading = (strpos($heading, ',') !== false) ? explode(',', $heading):$heading;

      ?>
        <section class="mama-hero mama-style3 mama-bg mama-flex">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="mama-hero-text">
                  <div class="mama-section-heading mama-style2 text-center">
                    <h1 class="mama-text-slider slide mama-f48-lg mama-f36-sm mama-font-name mama-m0 mama-mt-9 mama-mt-5-sm">

                      <?php if(is_array($heading)): ?>

                        <span><?php echo wp_kses_post($heading[0]); ?></span>
                        <span class="mama-words-wrapper mama-waiting">
                          <b class="is-visible"><?php echo wp_kses_post($heading[1]); ?>.</b>
                          <?php 
                            $heading = array_slice($heading, 2);  
                            if(!empty($heading) && is_array($heading)):
                              foreach($heading as $words):
                          ?>  
                                <b><?php echo wp_kses_post($words); ?></b>
                          <?php 
                              endforeach; 
                            endif; 
                          ?>
                        </span>
                      <?php else: ?>
                        <span><?php echo wp_kses_post($heading); ?></span>
                      <?php endif; ?>

                    </h1>
                    <div class="empty-space marg-lg-b10"></div>
                  <?php if(!empty($description)): ?>
                    <div class="mama-hero-subtitle mama-f18-lg mama-f16-sm mama-line1-6 mama-mb-3"><?php echo wp_kses_post($description); ?></div>
                  <?php endif; ?>
                  </div>
                  <div class="empty-space marg-lg-b35"></div>

                  <?php if(class_exists('Newsletter')): ?>
                    <form action="<?php echo esc_url(home_url('/')); ?>?na=s" onsubmit="return newsletter_check(this)" class="mama-hero-form mama-style1">
                      <input type="email" name="ne" required="" placeholder="<?php echo esc_html__('Enter Your Email Adress', 'mama-elementor'); ?>">
                      <?php if(!empty($btn_text)): ?>
                        <button class="mama-btn mama-subscribe-btn newsletter-submit mama-style4 mama-color9"><?php echo esc_html($btn_text); ?></button>
                      <?php endif; ?>
                    </form>
                    <div class="empty-space marg-lg-b60 marg-sm-b40"></div>
                  <?php endif; ?>

                  <?php if(!empty($bg_image) && is_array($bg_image)): ?>
                    <div class="mama-hero-img text-center">
                      <img src="<?php echo esc_url($bg_image['url']); ?>" alt="image">
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Hero Section -->
        <?php
        # code...
        break;

      case 'style3': 

        $bg_style = (is_array($bg_image) && !empty($bg_image['url'])) ? ' style="background-image:url('.esc_url($bg_image['url']).');"':''; 

      ?>
        <div class="mama-hero mama-style7 mama-bg mama-flex"<?php echo wp_kses_post($bg_style); ?>>
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <div class="mama-vertical-middle">
                  <div class="mama-hero-text">
                    <?php if(!empty($heading)): ?>
                      <h1 class="mama-hero-title mama-text-slider mama-f60-lg mama-f35-sm mama-m0 mama-font-name"><?php echo wp_kses_post($heading); ?></h1>
                      <div class="empty-space marg-lg-b10 marg-sm-b10"></div>
                    <?php endif; ?>
                    <?php if(!empty($description)): ?>
                      <div class="mama-hero-subtitle mama-f18-lg mama-line1-6"><?php echo wp_kses_post($description); ?></div>
                      <div class="empty-space marg-lg-b35 marg-sm-b35"></div>
                    <?php endif; ?>
                    <?php if(!empty($btn_text)): ?>
                      <div class="mama-hero-btn">
                        <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style6'; ?> mama-color8"><span><?php echo esc_html($btn_text); ?></span></a>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <?php if(!empty($form_id)): ?>
                <div class="col-lg-5">
                  <div class="mama-box-shadow2">
                    <div class="mama-hero-form mama-style2 mama-radious-4">
                      <div class="mama-form-heading mama-style1 text-center">
                        <h2 class="mama-f24-lg mama-mb4 mama-mt-6"><?php echo esc_html($form_heading); ?></h2>
                        <div class="mama-mb-6 mama-form-sub-heading"><?php echo esc_html($form_sub_heading); ?></div>
                      </div><!-- .mama-form-heading -->

                        <!-- form starts from here [contact form 7] -->
                        <div class="mama-appointment-form mama-form-body"><?php echo do_shortcode('[contact-form-7 id="'.esc_attr($form_id).'"]'); ?></div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>


            </div>
          </div>
         </div>
         <?php
        # code...
        break;

      case 'style4': 
        $bg_style = (is_array($bg_image) && !empty($bg_image['url'])) ? ' style="background-image:url('.esc_url($bg_image['url']).');"':''; 
      ?>
        <div class="mama-hero mama-parallax <?php echo esc_attr($overlay); ?> mama-style9 mama-bg mama-flex text-center" data-speed="0.4" <?php echo wp_kses_post($bg_style); ?>>
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="mama-hero-text">
                  <?php if(!empty($heading)): ?>
                    <h1 class="mama-hero-title mama-text-slider mama-white-c mama-f60-lg mama-f38-sm mama-font-name mama-m0"><?php echo wp_kses_post($heading); ?></h1>
                    <div class="empty-space marg-lg-b5"></div>
                  <?php endif; ?>
                  <?php if(!empty($description)): ?>
                    <div class="mama-hero-subtitle mama-white-c mama-f20-lg mama-line1-6"><?php echo wp_kses_post($description); ?></div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        # code...
        break;

      case 'style5': ?>
        <div class="mama-hero-banner">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="empty-space marg-lg-b100 marg-sm-b60"></div>
                <div class="mama-hero-text">
                  <?php if(!empty($heading)): ?>
                    <h1 class="mama-hero-title mama-text-slider mama-f60-lg mama-f38-sm mama-font-name mama-mp0"><?php echo wp_kses_post($heading); ?></h1>
                    <div class="empty-space marg-lg-b5"></div>
                  <?php endif; ?>
                  <?php if(!empty($description)): ?>
                    <div class="mama-hero-subtitle mama-f20-lg mama-line1-6 mama-mb2"><?php echo wp_kses_post($description); ?></div>
                    <div class="empty-space marg-lg-b30 marg-sm-b30"></div>
                  <?php endif; ?>
                  <?php if(!empty($btn_text)): ?>
                    <div class="mama-hero-btn">
                      <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style6'; ?> mama-color4"><?php echo esc_html($btn_text); ?></a>
                    </div>
                    <div class="empty-space marg-lg-b60 marg-sm-b40"></div>
                  <?php endif; ?>
                  <?php if(is_array($client_images) & !empty($client_images)): ?>
                    <div class="mama-clients mama-style1">
                      <?php foreach($client_images as $image): if(!empty($image['url'])): ?>
                        <div class="mama-client mama-style4"><img src="<?php echo esc_url($image['url']); ?>" alt=""></div>
                      <?php endif; endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="empty-space marg-lg-b100 marg-sm-b0"></div>
              </div>

              <?php if(!empty($bg_image['url'])): ?>
                <div class="col-lg-6">
                  <div class="empty-space marg-lg-b100 marg-sm-b30"></div>
                  <div class="mama-hero-img text-center">
                    <img src="<?php echo esc_url($bg_image['url']); ?>" alt="hero-img">
                    <div class="mama-shap-animation-wrap">
                      <div class="mama-shap-animation mama-shap-animation2"><span></span></div>
                      <div class="mama-shap-animation mama-shap-animation3"></div>
                    </div>
                    <div class="mama-pattern-animation"><div class="mama-pattern2"></div></div>
                  </div>
                  <div class="empty-space marg-lg-b100 marg-sm-b60"></div>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
        <?php
        # code...
        break;

      case 'style6': 
        $heading = (strpos($heading, ',') !== false) ? explode(',', $heading):$heading;
      ?>
        <div class="mama-hero mama-style10 mama-flex">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="empty-space marg-lg-b150 marg-sm-b100"></div>
                <div class="mama-section-heading mama-style2">
                  <div class="mama-f16-lg mama-hero-subtitle mama-mt-4"><?php echo wp_kses_post($description); ?></div>
                  <div class="empty-space marg-lg-b10"></div>
                  <h1 class="mama-text-slider slide mama-f48-lg mama-f36-sm mama-font-name mama-mb-3">

                    <?php if(is_array($heading)): ?>

                      <span><?php echo wp_kses_post($heading[0]); ?></span>
                      <span class="mama-words-wrapper mama-waiting">
                        <b class="is-visible"><?php echo wp_kses_post($heading[1]); ?>.</b>
                        <?php 
                          $heading = array_slice($heading, 2);  
                          if(!empty($heading) && is_array($heading)):
                            foreach($heading as $words):
                        ?>  
                              <b><?php echo wp_kses_post($words); ?></b>
                        <?php 
                            endforeach; 
                          endif; 
                        ?>
                      </span>
                    <?php else: ?>
                      <span><?php echo wp_kses_post($heading); ?></span>
                    <?php endif; ?>

                  </h1>
                </div>
                <div class="empty-space marg-lg-b135 marg-sm-b90"></div>
              </div>
            </div>
          </div>
          <div class="mama-shap-animation-wrap mama-style1">
            <div class="mama-shap-animation mama-shap-animation1">
              <div class="mama-shap-animation-in">
                <b></b>
                <span></span>
              </div>
            </div>
            <div class="mama-shap-animation mama-shap-animation2"><span></span></div>
            <div class="mama-shap-animation mama-shap-animation3"></div>
          </div>
        </div>
        <?php
        # code...
        break;

      case 'style7': ?>
        <!-- Start Hero Section -->


        <div class="mama-hero mama-style5 mama-flex">
          <!-- <div id="mama-ball-wrap" class=" wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.1s"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="mama-vertical-middle">
                  <div class="mama-vertical-middle-in">
                    <?php if(!empty($heading)): ?>
                      <h1 class="mama-text-slider mama-f60-lg mama-f40-sm mama-line1 mama-m0 mama-font-name"><?php echo wp_kses_post($heading); ?></h1>
                      <div class="empty-space marg-lg-b15"></div>
                    <?php endif; ?>
                    <?php if(!empty($description)): ?>
                      <div class="mama-hero-subtitle mama-f18-lg mama-line1-6 mama-mb2"><?php echo wp_kses_post($description); ?></div>
                      <div class="empty-space marg-lg-b30"></div>
                    <?php endif; ?>
                    <div class="mama-hero-btn">
                      <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style4'; ?> mama-color19"><?php echo esc_html($btn_text); ?></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php if(!empty($bg_image['url'])): ?>
                <div class="col-lg-6">
                  <div class="mama-vertical-middle">
                    <div class="mama-vertical-middle-in">
                      <div class="mama-hero-img mama-style1" >
                        <div class="mama-hero-img-box mama-bg" style="background-image: url(<?php echo esc_url($bg_image['url']); ?>);"></div>
                        <div class="mama-hero-img-box-pattern"><div class="mama-pattern1"></div></div>
                        <div class="mama-hero-img-box-circle"></div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php
        # code...
        break;

      case 'style8': ?>

        <div class="mama-hero mama-style11 mama-bg mama-flex">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="mama-hero-text text-center">
                  <h1 class="mama-hero-title mama-text-slider mama-white-c mama-f48-lg mama-f35-sm mama-font-name mama-m0"><?php echo wp_kses_post($heading); ?></h1>
                  <div class="empty-space marg-lg-b10"></div>
                  <div class="mama-hero-subtitle mama-white-c mama-f18-lg mama-line1-6 mama-mb2"><?php echo wp_kses_post($description); ?></div>
                  <div class="empty-space marg-lg-b30"></div>
                  <div class="mama-btn-group mama-hero-btn mama-style1">
                    <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style4'; ?> mama-color1"><?php echo esc_html($btn_text); ?></a>
                  </div>
                </div>
                <?php if(!empty($bg_image['url'])): ?>
                  <div class="empty-space marg-lg-b80 marg-sm-b40"></div>
                  <div class="mama-hero-img mama-style2">
                    <img src="<?php echo esc_url($bg_image['url']); ?>" alt="image">
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="mama-circle-shape-wrap">
            <div class="mama-circle-shape1"></div>
            <div class="mama-circle-shape2"></div>
            <div class="mama-circle-shape3"></div>
          </div>
          <svg id="mama-svg-wave"><path></path><path></path></svg> 
        </div>
        <?php
        # code...
        break;

      case 'style9': ?>
        <div class="mama-hero12-wrap">
          <div class="mama-hero <?php echo esc_attr($overlay); ?> mama-style12 mama-flex text-center">
            <div class="mama-hero-bg mama-bg" style="background-image: url(<?php echo esc_url($bg_image['url']); ?>);"></div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mama-hero-text">
                    <h1 class="mama-hero-title mama-white-c mama-f72-lg mama-text-slider mama-f42-sm mama-m0 mama-mt-10"><?php echo wp_kses_post($heading); ?></h1>
                    <div class="empty-space marg-lg-b15"></div>
                    <div class="mama-hero-subtitle mama-white-c7 mama-f20-lg mama-f16-sm mama-line1-6 mama-mb2"><?php echo wp_kses_post($description); ?></div>
                    <div class="empty-space marg-lg-b40 marg-sm-b40"></div>
                    <div class="mama-hero-btn">
                      <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style6'; ?> mama-color20"><?php echo esc_html($btn_text); ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        break;
             
   } 

  }

}

Plugin::instance()->widgets_manager->register_widget_type( new Mama_Hero_Banner() );