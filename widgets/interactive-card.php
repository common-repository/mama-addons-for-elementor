<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Interactive_Card_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-interactive-card-widget';
    }

    public function get_title() {
        return 'Interactive Card';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'interactive_card_section',
            array(
                'label' => esc_html__('Text Block With Button' , 'mama-elementor')
            )
        );

        $this->add_control(
            'style',
            array(
                'label'   => esc_html__('Style', 'mama-elementor'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'label_block' => true,
                'options' => array(
                    'style1' => 'Style 1',
                    'style2' => 'Style 2',
                )
            )
        );


        $this->add_control(
            'image',
            array(
                'label'   => esc_html__('Image', 'mama-elementor'),
                'type'    => Controls_Manager::MEDIA,
                'default' => array('url' => \Elementor\Utils::get_placeholder_image_src()),
            )
        );

        $this->add_control(
            'youtube_url',
            array(
                'label'       => esc_html__('URL', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter your URL', 'mama-elementor'),
                'default'     => 'https://www.youtube.com/embed/7KIEvEODCI4?autoplay=1',
                'label_block' => true,
                'condition'   => array('style' => array('style2'))
            )
        );


        $this->add_control(
            'heading',
            array(
                'label'       => esc_html__('Heading', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('Enter your heading', 'mama-elementor'),
                'default'     => esc_html__('Rewarding entertainment for you and your loved ones', 'mama-elementor'),
            )
        );

        $this->add_control(
            'description',
            array(
                'label'       => esc_html__('Description', 'mama-elementor'),
                'type'        => Controls_Manager::WYSIWYG,
                'default'     => esc_html__('I also believe it\'s important for every member to be involved and invested in our company and this is one way to do so crank this out products need full resourcing and support from a cross-functional team.', 'mama-elementor'),
                'label_block' => true,
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
            )
        );

        $this->add_control(
            'btn_text',
            array(
                'label'       => esc_html__('Button Text', 'mama-elementor'),
                'placeholder' => esc_html__('Enter your button text here.', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('Learn More', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'btn_link',
            array(
                'label'       => esc_html__('Button Link', 'mama-elementor'),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                'default'     => array('url' => '#'),
                'placeholder' => esc_html__('https://your-link.com', 'mama-elementor'),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_general_style',
            array(
                'label' => esc_html__('General (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            array(
                'name'      => 'background',
                'label'     => esc_html__('Background', 'mama-elementor'),
                'types'     => array('classic', 'gradient'),
                'selector'  => '',
            )
        );


        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            array(
                'name'      => 'box_shadow',
                'label'     => esc_html__('Box Shadow', 'mama-elementor'),
                'selector'  => '',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style_heading',
            array(
                'label' => esc_html__('Heading (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('heading_color',
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
                'name'     => 'heading_typography',
                'selector' => '',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_style_description',
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
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-btn' => 'background-color: {{VALUE}}; border-color:{{VALUE}};',
                ),
            )
        );

        $this->add_control('btn_text_color',
            array(
                'label'       => esc_html__('Text Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-btn' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'btn_typography',
                'selector' => '{{WRAPPER}} .mama-btn',
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
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-btn:hover' => 'background-color: {{VALUE}}; border-color:{{VALUE}};',
                ),
            )
        );


        $this->add_control('btn_text_color_hover',
            array(
                'label'       => esc_html__('Text Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-btn:hover' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'btn_typography_hover',
                'selector' => '{{WRAPPER}} .mama-btn:hover',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_tab();
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
        $settings             = $this->get_settings();
        $style                = $settings['style'];
        $image                = $settings['image'];
        $youtube_url          = $settings['youtube_url'];
        $heading              = $settings['heading'];
        $description          = $settings['description'];
        $btn_text             = $settings['btn_text'];
        $primary_button_style = $settings['button_style'];
        $href                 = (!empty($settings['btn_link']['url']) ) ? $settings['btn_link']['url'] : '#';
        $target               = ($settings['btn_link']['is_external'] == 'on') ? '_blank' : '_self';

        switch ($style) {
            case 'style1': default: ?>
            <div class="mama-image-box mama-style7">
                <?php if(!empty($image['url'])): ?>
                    <div class="mama-image-box-img"><img src="<?php echo esc_url($image['url']); ?>" alt="img"></div>
                <?php endif; ?>
                <div class="mama-image-box-text">
                    <div class="mama-image-box-text-in">
                        <h2 class="mama-image-box-title mama-heading"><?php echo wp_kses_post($heading); ?></h2>
                        <div class="mama-image-box-subtitle mama-description"><?php echo wp_kses_post($description); ?></div>
                        <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-btn-primary <?php echo (!empty($button_style)) ? $primary_button_style: 'mama-style3'; ?> mama-color2 mama-font-name"><?php echo esc_html($btn_text); ?></a>
                    </div>
                </div>
            </div>
            <?php
            # code...
            break;

            case 'style2': ?>
                <div class="mama-image-box mama-style8">
                    <div class="mama-image-box-text">
                        <div class="mama-image-box-text-in">
                            <h2 class="mama-image-box-title mama-heading"><?php echo wp_kses_post($heading); ?></h2>
                            <div class="mama-image-box-subtitle mama-description"><?php echo wp_kses_post($description); ?></div>
                            <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-btn-primary <?php echo (!empty($button_style)) ? $primary_button_style: 'mama-style3'; ?> mama-color2 mama-font-name"><?php echo esc_html($btn_text); ?></a>
                        </div>
                    </div>
                    <?php if(!empty($image['url'])): ?>
                        <div class="mama-image-box-img">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="img">
                            <a href="<?php echo esc_url($youtube_url); ?>" class="mama-play-btn mama-style1 mama-video-open"></a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                # code...
                break;
        }

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Interactive_Card_Widget() );