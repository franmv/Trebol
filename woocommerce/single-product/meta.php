<?php
/**
 * Single Product Meta
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

  <?php do_action( 'woocommerce_product_meta_start' ); ?>

  <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

    <span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

  <?php endif; ?>

  <h3><i class="os-icon os-icon-archive"></i> <?php _e('Categories', 'moon'); ?></h3>
  <?php echo $product->get_categories( '</li><li>', '<ul class="post-categories"><li>', '</li></ul>' ); ?>
  <h3><i class="os-icon os-icon-tags"></i> <?php _e('Tags', 'moon'); ?></h3>
  <?php echo $product->get_tags( '</li><li>', '<ul class="post-tags"><li>', '</li></ul>' ); ?>

  <?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
