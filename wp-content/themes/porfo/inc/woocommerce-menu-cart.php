<?php


add_action( '__after_menu_items' , 'porfo_woocommerce_menu_cart' );

function porfo_woocommerce_menu_cart( ) {
  // If we're not on the home page, do nothing
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )

	return false;

	ob_start();
		global $woocommerce;
		$viewing_cart = esc_attr__('View your shopping cart', 'porfo');
		$start_shopping = esc_attr__('Start shopping', 'porfo');
		$cart_url =  esc_url( get_permalink(get_option( 'woocommerce_cart_page_id' ) ) );
		$shop_page_url = esc_url( get_permalink( get_option( 'woocommerce_shop_page_id' ) ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = esc_html(  $cart_contents_count  );
		$cart_total = esc_html( $woocommerce->cart->get_cart_total() );
			if ($cart_contents_count == 0) {
				$menu_item = '<div class="header_cart">  <a href="'. $shop_page_url .'" class="cart" title="'. $start_shopping .'"> ';
			} else {
				$menu_item = '<div class="header_cart">  <a href="'. $cart_url .'" class="cart" title="'. $viewing_cart .'">';
			}


			$menu_item .= '<span class="cart-items">'. $cart_contents .'</span> ';

			$menu_item .= '<span class="cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </span>';

			$menu_item .= '</a> </div>';

		echo $menu_item;
}
