<?php get_header(); ?>

<?php 
$product_lists = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post_type' => 'products'
    )
    );
while ($product_lists->have_posts() ):
    $product_lists->the_post();
?>
 <!-- Page Header Start -->
 <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="/products/">Products</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Product_name</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<section class="bg-sand padding-large">
	<div class="container">
		<div class="row">

        <?php if (has_post_thumbnail() ) : ?>

			<div class="col-md-6">
            <div class="product-image" style="overflow: hidden;">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive product-image responsive--full', 'title' => 'Product image']); ?>
            </div>
			</div>
            <?php endif; ?>
			<div class="col-md-6 pl-5">
				<div class="product-detail">
					<h5 class="pt-4"><?php the_title() ?></h5>
					<p>Cake - Pastries</p>
					<span class="price colored"><?php echo the_field('product_price'); ?> </span>

                    <?php the_content(); ?>

					<label for="delivery-date">Delivery Date</label>
					<input type="text" id="delivery-date" class="input-text" name="delivery-date" placeholder="Delivery Date">

					<label class="screen-reader-text" for="qty">Black Forest Pastry Quantity</label>
					<input type="number" id="qty" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
					<button type="submit" name="add-to-cart" value="27545" class="button">Add to cart</button>

				</div>
			</div>

		</div>
	</div>
</section>


<?php
endwhile;
get_footer(); 
?>