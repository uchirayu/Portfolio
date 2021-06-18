(function (api) {
    var cssTemplate = wp.template('cocobasic-color-scheme'),
            colorSchemeKeys = [
                'cocobasic_preloader_background_color',
                'cocobasic_body_background_color',
                'cocobasic_body_color',
                'cocobasic_link_color',
                'cocobasic_menu_color',
                'cocobasic_mobile_menu_color',
                'cocobasic_mobile_menu_bgcolor',
                'cocobasic_active_menu_color',
                'cocobasic_global_color',
                'cocobasic_global_color2'
            ],
            colorSettings = [
                'cocobasic_preloader_background_color',
                'cocobasic_body_background_color',
                'cocobasic_body_color',
                'cocobasic_link_color',
                'cocobasic_menu_color',
                'cocobasic_mobile_menu_color',
                'cocobasic_mobile_menu_bgcolor',
                'cocobasic_active_menu_color',
                'cocobasic_global_color',
                'cocobasic_global_color2'
            ];

    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('cocobasic_color_scheme_selector' === this.id) {

                this.setting.bind('change', function (value) {

                    api('cocobasic_preloader_background_color').set(colorScheme[value].colors[0]);
                    api.control('cocobasic_preloader_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[0])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[0]);

                    api('cocobasic_body_background_color').set(colorScheme[value].colors[1]);
                    api.control('cocobasic_body_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[1])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[1]);

                    api('cocobasic_body_color').set(colorScheme[value].colors[2]);
                    api.control('cocobasic_body_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[2])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[2]);

                    api('cocobasic_link_color').set(colorScheme[value].colors[3]);
                    api.control('cocobasic_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[3])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[3]);

                    api('cocobasic_menu_color').set(colorScheme[value].colors[4]);
                    api.control('cocobasic_menu_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[4])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[4]);

                    api('cocobasic_mobile_menu_color').set(colorScheme[value].colors[5]);
                    api.control('cocobasic_mobile_menu_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[5])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[5]);

                    api('cocobasic_mobile_menu_bgcolor').set(colorScheme[value].colors[6]);
                    api.control('cocobasic_mobile_menu_bgcolor').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[6])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[6]);

                    api('cocobasic_active_menu_color').set(colorScheme[value].colors[7]);
                    api.control('cocobasic_active_menu_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[7])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[7]);

                    api('cocobasic_global_color').set(colorScheme[value].colors[8]);
                    api.control('cocobasic_global_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[8])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[8]);

                    api('cocobasic_global_color2').set(colorScheme[value].colors[9]);
                    api.control('cocobasic_global_color2').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[9])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[9]);
                });
            }
        }
    });

})(wp.customize);