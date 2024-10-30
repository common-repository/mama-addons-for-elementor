<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

class Mama_Round_Chart_Widget extends Widget_Base {

    public function get_name() {
        return 'mama-round-chart-widget';
    }

    public function get_title() {
        return 'Round Chart';
    }

    public function get_icon() {
        return 'fab fa-meetup';
    }

    public function get_categories() {
        return array('mama-elements');
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'round_chart_section',
            array(
                'label' => esc_html__('Round Chart' , 'mama-elementor')
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'label',
            array(
                'label'       => esc_html__('Label', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('Bitcoin', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $repeater->add_control(
            'value',
            array(
                'label'       => esc_html__('Value', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('90', 'mama-elementor'),
                'type'        => Controls_Manager::TEXT,
            )
        );

        $repeater->add_control(
            'stroke_color',
            array(
                'label'       => esc_html__('Stroke Color', 'mama-elementor'),
                'label_block' => true,
                'default'     => esc_html__('#4ed55f', 'mama-elementor'),
                'type'        => Controls_Manager::COLOR,
            )
        );

        $this->add_control(
            'round_chart',
            array(
                'label'   => esc_html__('Round Chart', 'mama-elementor'),
                'type'    => Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => array(
                    array(
                        'label'        => esc_html__('Bitcoin', 'mama-elementor'),
                        'value'        => esc_html__('90', 'mama-elementor'),
                        'stroke_color' => esc_html__('#4ed55f', 'mama-elementor'),
                    ),
                ),
                'title_field' => '<span>{{ label }} - {{ value }}</span>',
            )
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings    = $this->get_settings_for_display();
        $round_chart = $settings['round_chart'];
        ?>

        <div class="mama-circle-chart mama-round-chart mama-style1 mama-box-shadow1" data-options="<?php echo esc_attr(json_encode($round_chart)); ?>">
            <div class="mama-circle-chart-in">
                <canvas id="mama-chart1" height="140" width="140"></canvas>
                <div class="mama-offer-percentage">
                    <h4>30%</h4>
                    <span>Webcoin</span>
                </div>
            </div>
            <?php if(!empty($round_chart) && is_array($round_chart)): ?>
                <ul class="mama-circle-stroke mama-mp0">
                    <?php for($i = 0; $i < count($round_chart); $i++): ?>
                        <li>
                            <span class="mama-circle-color"></span>
                            <span class="mama-circle-label"></span>
                        </li>
                    <?php endfor; ?>
                </ul>
            <?php endif; ?>
        </div>
        <?php

    }

}
Plugin::instance()->widgets_manager->register_widget_type( new Mama_Round_Chart_Widget() );