document.addEventListener( 'DOMContentLoaded', function() {
	let lazyImages = [].slice.call( document.querySelectorAll( 'img.js-lazy' ) );
	let active = false;

	const lazyLoad = function() {
		if ( false === active ) {
			active = true;

			setTimeout( function() {
				lazyImages.forEach( function( lazyImage ) {
					if (
						lazyImage.getBoundingClientRect().top <=
                        window.innerHeight &&
                        0 <= lazyImage.getBoundingClientRect().bottom &&
                        'none' !== getComputedStyle( lazyImage ).display
					) {
						lazyImage.src = lazyImage.dataset.src;

						//lazyImage.classList.remove("js-lazy");

						lazyImages = lazyImages.filter( function( image ) {
							return image !== lazyImage;
						});

						if ( 0 === lazyImages.length ) {
							document.removeEventListener( 'scroll', lazyLoad );
							window.removeEventListener( 'resize', lazyLoad );
							window.removeEventListener(
								'orientationchange',
								lazyLoad
							);
						}
					}
				});

				active = false;
			}, 200 );
		}
	};

	const wrapper = document.getElementsByTagName( 'body' );
	wrapper.addEventListener( 'scroll', lazyLoad );
	window.addEventListener( 'resize', lazyLoad );
	window.addEventListener( 'orientationchange', lazyLoad );
});
