<?php

/** Control Tab */
if (class_exists('WP_Customize_Control')) {

    class supersalon_Tab_Control extends WP_Customize_Control {

        public $type = 'supersalon-tab';
        public $buttons = '';

        public function __construct($manager, $id, $args = array()) {
            parent::__construct($manager, $id, $args);
        }

        public function to_json() {
            parent::to_json();
            $first = true;
            $formatted_buttons = array();
            $all_fields = array();
            foreach ($this->buttons as $button) {
                //$fields = array();
                $active = isset($button['active']) ? $button['active'] : false;
                if ($active && $first) {
                    $first = false;
                } elseif ($active && !$first) {
                    $active = false;
                }

                $formatted_buttons[] = array(
                    'name' => $button['name'],
                    'icon' => isset($button['icon']) ? $button['icon'] : '',
                    'fields' => $button['fields'],
                    'active' => $active,
                );
                $all_fields = array_merge($all_fields, $button['fields']);
            }
            $this->json['buttons'] = $formatted_buttons;
            $this->json['fields'] = $all_fields;
        }

        public function content_template() {
            ?>
            <div class="supersalon-customizer-tab-wrap">
                <# if ( data.buttons ) { #>
                <div class="supersalon-customizer-tabs">
                    <# for (tab in data.buttons) { #>
                    <a href="#" class="supersalon-customizer-tab <# if ( data.buttons[tab].active ) { #> active <# } #>" data-tab="{{ tab }}">
                        <# if ( data.buttons[tab].icon ) { #> 
                        <span class="{{ data.buttons[tab].icon }}"></span>
                        <# } #>
                        {{ data.buttons[tab].name }}
                    </a>
                    <# } #>
                </div>
                <# } #>
            </div>
            <?php
        }
    }

    class supersalon_Custom_Control extends WP_Customize_Control {
        public $type = 'slider_control';
        public function render_content() {
        ?>
            <div class="slider-custom-control">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> /><span class="slider-reset" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"><?php echo esc_html_e('Reset', 'super-salon'); ?></span>
            </div>
        <?php
        }
    }
    
    class supersalon_Reset_Custom_Control extends WP_Customize_Control {
        public $type = 'reset_control';
        public function render_content() {
        ?>
            <div class="reset-custom-control">
                <span class="customize-reset-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="reset-button"><?php echo esc_html_e('Reset', 'super-salon'); ?></span>
            </div>
            <div id="myModal" class="modal kt-modal">
              <div class="modal-content">
                <span class="close">X</span>
                <h3><?php esc_html_e('Are you sure you want to reset setting? ', 'super-salon') ?></h3>
                <p><?php esc_html_e('Accept this setting will reset this section default values. All the content will be lost in this section.', 'super-salon') ?></p>
                <a href="javascript:location.reload();" class="refresh-btn" data-value="<?php echo esc_attr( $this->description ); ?>"><?php echo esc_html_e('OK', 'super-salon'); ?></a>
              </div>

            </div>
        <?php
        }
    }

    class supersalon_Toggle_Switch_Custom_Control extends WP_Customize_Control {
        public $type = 'toogle_switch';
        public function render_content(){
        ?>
            <div class="toggle-switch-control">
                <div class="toggle-switch">
                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?>>
                    <label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
                        <span class="toggle-switch-inner"></span>
                        <span class="toggle-switch-btn"></span>
                    </label>
                </div>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
            </div>
        <?php
        }
    }

}