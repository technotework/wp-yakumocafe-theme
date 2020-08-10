<?php
/**
 * Top page info loop
 *
 *  @package yakumocafe
 */

?>

<li class="p-content-info__listitem l-flex">

	<span class="p-content-info__date l-flex-vcenter"><a href="<?php the_permalink(); ?>"><?php the_time( 'Y/m/d' ); ?></a></span>
	<span class="p-content-info__content l-flex-vcenter"><a
	href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
</li>
