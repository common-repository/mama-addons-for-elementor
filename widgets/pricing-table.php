<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Pricing_Table_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-pricing-table-widget';
    }

    public function get_title() {
        return 'Pricing Table';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'pricing_section',
            array(
                'label' => esc_html__('Pricing Table' , 'mama-elementor')
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
                )
            )
        );

        $this->add_control(
            'is_featured',
            array(
                'label'       => esc_html__('Is this Featured ?', 'mama-elementor'),
                'type'        => Controls_Manager::SELECT,
                'default'     => 'no',
                'label_block' => true,
                'condition'   => array('style' => array('style2')),
                'options' => array(
                    'no'  => 'No',
                    'yes' => 'Yes',
                )
            )
        );

        $this->add_control(
            'plan',
            array(
                'label'       => esc_html__('Plan', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('Standard', 'mama-elementor'),
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $this->add_control(
            'currency',
            array(
                'label'       => esc_html__('Currency', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('$', 'mama-elementor'),
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $this->add_control(
            'price',
            array(
                'label'       => esc_html__('Price', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('499', 'mama-elementor'),
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $this->add_control(
            'duration',
            array(
                'label'       => esc_html__('Duration', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('month', 'mama-elementor'),
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'type'        => Controls_Manager::TEXT,
                'condition'   => array('style' => array('style1'))
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            array(
                'label'       => esc_html__('Icon', 'mama-elementor'),
                'type'        => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-check',
                    'library' => 'solid',
                ],
                'description' => esc_html__('This option is only for Style 1 & 3', 'mama-elementor')
            )
        );

        $repeater->add_control(
            'feature',
            array(
                'label'       => esc_html__('Feature', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('5000 GB Bandwidth', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $this->add_control(
            'features',
            array(
                'label'   => esc_html__('Features', 'mama-elementor'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'icon'    => 'fa fa-check',
                        'feature' => esc_html__('50 GB Bandwidth', 'mama-elementor'),
                    ),
                ),
                'title_field' => '<span>{{ feature }}</span>',
            )
        );

        $this->add_control(
            'button_style',
            array(
                'label'       => esc_html__('Button Style', 'mama-elementor'),
                'type'        => Controls_Manager::SELECT,
                'default'     => '',
                'label_block' => true,
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'options'     => array(
                    ''          => esc_html__('Choose Button Style', 'webify'),
                    'mama-style3' => esc_html__('Style 1', 'webify'),
                    'mama-style5' => esc_html__('Style 2', 'webify')
                ),
            )
        );

        $this->add_control(
            'btn_text',
            array(
                'label'       => esc_html__('Button Text', 'mama-elementor'),
                'placeholder' => esc_html__('Enter your button text here.', 'mama-elementor'),
                'label_block' => true,
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'default'     => esc_html__('Get Started', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT
            )
        );

        $this->add_control(
            'btn_link',
            array(
                'label'       => esc_html__('Button Link', 'mama-elementor'),
                'label_block' => true,
                'condition'   => array('style' => array('style1', 'style2', 'style3')),
                'type'        => Controls_Manager::URL,
                'default'     => array('url' => '#'),
                'placeholder' => esc_html__('https://your-link.com', 'mama-elementor'),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_plan_color',
            array(
                'label' => esc_html__('Plan', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('plan_color',
            array(
                'label'       => esc_html__('Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-pricing-heading' => 'color: {{VALUE}};',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'plan_typography',
                'selector' => '{{WRAPPER}} .mama-pricing-heading',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_price_color',
            array(
                'label' => esc_html__('Price (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('price_color',
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
                'name'     => 'price_typography',
                'selector' => '',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_features_color',
            array(
                'label' => esc_html__('Features (Pro)', 'mama-elementor'),
                'tab'   => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control('features_color',
            array(
                'label'       => esc_html__('Text Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '' => '',
                ),
            )
        );

        $this->add_control('icon_color',
            array(
                'label'       => esc_html__('Icon Color', 'mama-elementor'),
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
                'name'     => 'features_typography',
                'selector' => '{{WRAPPER}} .mama-pricing-feature',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
            )
        );

        $this->end_controls_section();

        $this->start_controls_section('section_btn_style',
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
                    '{{WRAPPER}} .mama-btn' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .mama-btn:hover'  => 'background-color: {{VALUE}};',
                ),
            )
        );


        $this->add_control('btn_text_color_hover',
            array(
                'label'       => esc_html__('Text Color', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'after',
                'selectors' => array(
                    '{{WRAPPER}} .mama-btn:hover'  => 'color: {{VALUE}};',
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
        $settings     = $this->get_settings_for_display();
        $style        = $settings['style'];
        $features     = $settings['features'];
        $plan         = $settings['plan'];
        $currency     = $settings['currency'];
        $duration     = $settings['duration'];
        $is_featured  = $settings['is_featured'];
        $price        = $settings['price'];
        $button_style = $settings['button_style'];
        $btn_text     = $settings['btn_text'];
        $href         = (!empty($settings['btn_link']['url']) ) ? $settings['btn_link']['url'] : '#';
        $target       = ($settings['btn_link']['is_external'] == 'on') ? '_blank' : '_self';


        switch ($style) {
            case 'style1':
            default: ?>
                <div class="mama-pricing-card mama-style1 mama-pricing-table mama-mkt-green">
                    <h3 class="mama-pricing-heading text-center mama-f16-lg mama-font-name mama-m0"><?php echo esc_html($plan); ?></h3>
                    <hr>
                    <div class="mama-price text-center">
                        <i class="mama-price-currency mama-f30-lg"><?php echo esc_html($currency); ?></i>
                        <span class="mama-f60-lg mama-pricing-price"><?php echo esc_html($price); ?></span>
                        <i class="mama-price-cycle mama-grayb5b5b5-c">/<?php echo esc_html($duration); ?></i>
                    </div>
                    <hr>
                    <?php if(!empty($features) && is_array($features)): ?>
                        <ul class="mama-pricing-feature mama-mp0 mama-f14-lg">
                            <?php foreach($features as $feature): ?>
                                <li><?php \Elementor\Icons_Manager::render_icon( $feature['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo esc_html($feature['feature']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty($btn_text)): ?>
                        <div class="mama-pricing-btn">
                            <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn mama-btn-primary <?php echo (!empty($button_style)) ? $button_style: 'mama-style3'; ?> mama-color9 w-100"><span><?php echo esc_html($btn_text); ?></span></a>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                # code...
                break;

            case 'style2': ?>
                <div class="mama-radious-4 mama-border mama-pricing-card mama-style2 text-center<?php echo ($is_featured == 'yes') ? ' mama-active':''; ?>">
                    <h3 class="mama-pricing-heading mama-666-c text-center mama-f16-lg mama-m0"><?php echo esc_html($plan); ?></h3>
                    <hr>
                    <div class="mama-price mama-fw-regular mama-font-name  mama-flex">
                        <i class="mama-price-currency mama-f24-lg"><?php echo esc_html($currency); ?></i>
                        <span class="mama-f48-lg mama-black111-c"><?php echo esc_html($price); ?></span>
                    </div>
                    <?php if(!empty($features) && is_array($features)): ?>
                        <ul class="mama-pricing-feature mama-mp0 ">
                            <?php foreach($features as $feature): ?>
                                <li><?php echo esc_html($feature['feature']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if(!empty($btn_text)): ?>
                        <div class="mama-pricing-btn">
                            <div class="empty-space marg-lg-b30"></div>
                            <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style5'; ?> <?php echo ($is_featured == 'yes') ? ' mama-color16':'mama-color5'; ?>"><span><?php echo esc_html($btn_text); ?></span></a>
                            <div class="empty-space marg-lg-b30"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
                # code...
                break;

            case 'style3': ?>
                <div class="mama-pricing-card-col mama-pricing-table-style3">
                    <div class="mama-pricing-card-row mama-pricing-heading"><?php echo esc_html($plan); ?></div>
                    <div class="mama-pricing-card-row">
                        <h3 class="mama-price mama-flex mama-m0">
                            <i class="mama-price-currency mama-f16-lg"><?php echo esc_html($currency); ?></i>
                            <span class="mama-f48-lg mama-line1"><?php echo esc_html($price); ?></span>
                        </h3>
                        <?php if(!empty($btn_text)): ?>
                            <div class="mama-pricing-card-btn">
                                <a href="<?php echo esc_url($href); ?>" target="<?php echo esc_attr($target); ?>" class="mama-btn <?php echo (!empty($button_style)) ? $button_style: 'mama-style3'; ?> mama-color17"><?php echo esc_html($btn_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if(!empty($features) && is_array($features)): ?>
                        <ul class="mama-pricing-feature mama-mp0 ">
                            <?php foreach($features as $feature): ?>
                                <li>
                                    <?php
                                    if(!empty($feature['feature'])):
                                        echo esc_html($feature['feature']);
                                    else:
                                        ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $feature['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo esc_html($feature['feature']); ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php
                # code...
                break;

            case 'style4': ?>
                <div class="mama-pricing-card-col mama-pricing-table-style4">
                    <div class="mama-pricing-card-row mama-pricing-heading"></div>
                    <div class="mama-pricing-card-row"></div>
                    <?php if(!empty($features) && is_array($features)): ?>
                        <ul class="mama-pricing-feature mama-mp0 ">
                            <?php foreach($features as $feature): ?>
                                <li><?php echo esc_html($feature['feature']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php
                # code...
                break;
        }

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Pricing_Table_Widget() );