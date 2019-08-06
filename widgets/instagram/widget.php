<?php
/**
 * Info box widget class
 *
 * @package Advanced_Addons
 */
namespace AAFE\Elementor\Widget;

use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Instagram extends Base {

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Instagram', 'advanced-addons-elementor' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'hm hm-instagram';
    }

    public function get_keywords() {
		return [ 'instagram', 'gallery', 'photos', 'images' ];
    }

    /**
     * Register content related controls
     */
	protected function register_content_controls() {
		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Layout', 'advanced-addons-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'access_token',
			[
				'label' => __( 'Access Token', 'advanced-addons-elementor' ),
				'description' => sprintf( __( 'You have not set Access Token. Please click here to %s', 'advanced-addons-elementor' ), '<a target="_self" href="https://instagram.pixelunion.net/">' . __( 'Set Access Token', 'advanced-addons-elementor' ) . '</a>' ),
				'type' => Controls_Manager::TEXT,
				'default' => '2238066121.1677ed0.45866c4b89b14e469023426bbc23b744',
			]
		);
        
        $this->add_control(
			'feed_columns',
			[
				'label' => __( 'Columns', 'advanced-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
				],
				'prefix_class' => 'elementor-grid-',
				'frontend_available' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'number_of_images',
			[
				'label' => __( 'Number of Images', 'advanced-addons-elementor' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 9,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Image Size', 'advanced-addons-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'standard_resolution',
				'options' => [
					'standard_resolution' => esc_html__( 'Standard', 'advanced-addons-elementor' ),
					'low_resolution' => esc_html__( 'Medium', 'advanced-addons-elementor' ),
					'thumbnail' => esc_html__( 'Small', 'advanced-addons-elementor' ),
				],
			]
		);

		$this->add_control(
			'show_likes',
			[
				'label' => __( 'Likes', 'advanced-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'advanced-addons-elementor' ),
				'label_off' => __( 'Hide', 'advanced-addons-elementor' ),
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_comments',
			[
				'label' => __( 'Comments', 'advanced-addons-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'advanced-addons-elementor' ),
				'label_off' => __( 'Hide', 'advanced-addons-elementor' ),
				'default' => 'yes',
			]
		);

        $this->end_controls_section();

    
        
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls() {

        
	}
	
	private function instagram_feed_for_elementor_feeds( $access_token, $image_num, $image_resolution ) {    
	    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . trim( $access_token ). '&count=' . trim( $image_num );

	    $feeds_json = wp_remote_fopen( $url );

	    $feeds_obj 	= json_decode( $feeds_json, true ); 

	    $feeds_images_array = array();

	    if ( 200 == $feeds_obj['meta']['code'] ) {

	        if ( ! empty( $feeds_obj['data'] ) ) {

	            foreach ( $feeds_obj['data'] as $data ) { 
	                array_push( $feeds_images_array, array( $data['images'][$image_resolution]['url'], $data['link'], $data['likes'], $data['comments'], $data['type'] ) );
	            }

	            $ending_array = array(
	                'images' => $feeds_images_array,
	            );

	            return $ending_array;
	        }
	    }
	}

	protected function render() {
		$settings = $this->get_settings();
		$id       = 'bdt-instagram-' . $this->get_id();
		?>

		<div class="wpcap-feed-main">

		<div class="wpcap-feed-inner">

			<?php
			$access_token = $settings['access_token'];

			$number_of_images = $settings['number_of_images'];

			$image_size = $settings['image_size'];

			$show_likes = $settings['show_likes'];

			$show_comments = $settings['show_comments'];

			$insta_feeds = $this->instagram_feed_for_elementor_feeds( esc_html( $access_token ), absint( $number_of_images ), esc_html( $image_size ) );

			$count 	= count( $insta_feeds['images'] );

			?>

			<div class="wpcap-feed-items wpcap-grid-container elementor-grid">
				<?php
					for ( $i = 0; $i < $count; $i ++ ) {
						if ( $insta_feeds['images'][ $i ] ) { ?>

							<div class="wpcap-feed-item feed-type-<?php echo esc_attr( $insta_feeds['images'][ $i ][4] ); ?>">

								<a href="<?php echo esc_url( $insta_feeds['images'][ $i ][1]); ?>" target="_blank">

									<img src="<?php echo esc_url( $insta_feeds['images'][ $i ][0] ); ?>" alt="">

									<?php if ( 'yes' === $show_likes || 'yes' === $show_comments ) { ?>
										<div class="wpcap-feed-likes-comments">
											<?php if ( 'yes' === $show_likes ) { ?>
												<span class="wpcap-feed-likes"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo absint( $insta_feeds['images'][ $i ][2]['count']); ?></span>
											<?php } ?>
											<?php if ( 'yes' === $show_comments ) { ?>
												<span class="wpcap-feed-comments"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo absint( $insta_feeds['images'][ $i ][3]['count']); ?></span>
											<?php } ?>
										</div>	
									<?php } ?>			            			
								</a>
							</div>
							<?php
						}
					} ?>
			</div>

		</div>			      						               
		</div>
        <?php
    }

   
}
