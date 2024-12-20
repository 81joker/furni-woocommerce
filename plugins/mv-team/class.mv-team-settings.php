<?php 

if( ! class_exists( 'MV_Team_Settings' )){
    class MV_Team_Settings{

        public static $options;

        public function __construct(){
            self::$options = get_option( 'mv_team_options' );
            // var_dump( self::$options);
            add_action( 'admin_init', array( $this, 'admin_init') );
        }

        public function admin_init(){
            // To save the slider sittings database
            // register_setting( $option_group:string, $option_name:string, $args:array )
            /*
                    `register_setting()` هي إحدى دوال WordPress المستخدمة لتسجيل إعدادات (settings) جديدة في قاعدة بيانات موقع WordPress.

                        يتم استخدامها بشكل شائع في إضافات (plugins) وقوالب (themes) لتسجيل مجموعة من الإعدادات والخيارات التي يمكن للمستخدم تخصيصها من لوحة التحكم.

                        في هذا المثال الخاص:

                        1. `'mv_slider_group'`: هذا هو اسم المجموعة التي ستُسجل فيها الإعدادات. يمكن استخدام أي اسم مناسب هنا.

                        2. `'mv_slider_options'`: هذا هو اسم الخيار (option) الذي سيتم تسجيله في قاعدة بيانات WordPress. يمكن استخدام أي اسم مناسب هنا.

                        3. `array( $this, 'mv_slider_validate' )`: هذا هو الخيار الثالث والذي يتضمن وظيفة التحقق (validation function) التي سيتم استدعاؤها عند حفظ الإعدادات.
                         في هذه الحالة، الوظيفة `mv_slider_validate()` سيتم استدعاؤها لتحقق من صحة قيم الإعدادات قبل حفظها في قاعدة البيانات.

                        بشكل عام، `register_setting()` تُستخدم لتسجيل مجموعة من الإعدادات في موقع WordPress والتي يمكن للمستخدم الوصول إليها وتخصيصها من لوحة التحكم. كما أنها تسمح بتحقق من صحة الإعدادات قبل حفظها في قاعدة البيانات.

            */
            register_setting('mv_slider_group' , 'mv_team_options' , array( $this, 'mv_team_validate' ) );


            add_settings_section(
                'mv_team_main_section',
                'How does it work?',
                null,
                'mv_team_page1'
            );

            add_settings_section(
                'mv_team_second_section',
                'Other Plugin Options',
                null,
                'mv_team_page2'
            );

            add_settings_field(
                'mv_team_shortcode',
                'Shortcode',
                array( $this, 'mv_team_shortcode_callback' ),
                'mv_team_page1',
                'mv_team_main_section'
            );
            add_settings_field(
                'mv_team_title',
                'team Title',
                array( $this, 'mv_team_title_callback' ),
                'mv_team_page2',
                'mv_team_second_section',
                array(
                    'label_for' => 'mv_team_title'
                )
            );

            add_settings_field(
                'mv_team_bullets',
                'Display Bullets',
                array( $this, 'mv_team_bullets_callback' ),
                'mv_team_page2',
                'mv_team_second_section',
                array(
                    'label_for' => 'mv_team_bullets'
                )
            );

            add_settings_field(
                'mv_team_style',
                'Slider StyleXX',
                array( $this, 'mv_team_style_callback' ),
                'mv_team_page2',
                'mv_team_second_section',
                array(
                    'items' => array(
                        'style-1',
                        'style-2'
                    ),
                    'label_for' => 'mv_team_style'
                )
            );

        }

        public function mv_team_shortcode_callback(  $args ){
            ?>
            <span>Use the shortcode [mv_team] to display the Image&Text in any page/post/widget</span>
            <?php
        }

        public function mv_team_title_callback(){
            ?>
                <input 
                type="text" 
                name="mv_team_options[mv_team_title]" 
                id="mv_team_title"
                value="<?php echo isset( self::$options['mv_team_title'] ) ? esc_attr( self::$options['mv_team_title'] ) : ''; ?>"
                >
            <?php
        }
        
        public function mv_team_bullets_callback( $args ){
            ?>
                <input 
                    type="checkbox"
                    name="mv_team_options[mv_team_bullets]"
                    id="mv_team_bullets"
                    value="1"
                    <?php 
                        if( isset( self::$options['mv_team_bullets'] ) ){
                            checked( "1", self::$options['mv_team_bullets'], true );
                        }    
                    ?>
                />
                <label for="mv_team_bullets">Whether to display bullets or not</label>
                
            <?php
        }

        public function mv_team_style_callback( $args ){
            ?>
            <select 
                id="mv_team_style" 
                name="mv_team_options[mv_team_style]">
                <?php 
                foreach( $args['items'] as $item ):
                ?>
                    <option value="<?php echo esc_attr( $item ); ?>" 
                        <?php 
                        isset( self::$options['mv_team_style'] ) ? selected( $item, self::$options['mv_team_style'], true ) : ''; 
                        ?>
                    >
                        <?php echo esc_html( ucfirst( $item ) ); ?>
                    </option>                
                <?php endforeach; ?>
            </select>
            <?php
        }

        public function mv_team_validate( $input ){
            $new_input = array();
            // foreach( $input as $key => $value ){
            //     $new_input[$key] = sanitize_text_field( $value );
            // }
            foreach( $input as $key => $value ){
                switch ($key){
                    case 'mv_team_title':
                        if( empty( $value )){
                            add_settings_error( 'mv_team_options', 'mv_team_message', 'The title field can not be left empty', 'error' );
                            $value = 'Please, type some text';
                        }
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    // case 'mv_team_int':
                    //     $new_input[$key] = absint( $value );
                    // break;
                    // case 'mv_slider_url':
                    //     $new_input[$key] = esc_url( $value );
                    // break;
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                }
            }
            return $new_input;
        }
        
    }
}

