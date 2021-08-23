(function ($) {
    "use strict";

    $('document').ready(function() {

		/**
		 *
		 * Hide Page Sidebar  Metabox
		 *
		 */
		function hidePageSidebarMetaBox() {

			// select page_template and _shape_sidebar_metabox
			var $pageTemplate = $('#page_template');
			var	$sidebarMetabox = $('#_shape_sidebar_metabox');
			
			// Hide _shape_sidebar_metabox on page load
			// If the template is not a default template
			if( $pageTemplate.val() !== 'default' ){
				$sidebarMetabox.hide();
			}


			// Hide _shape_sidebar_metabox on changing the value
			$pageTemplate.on('change', function() {
				var $val = $(this).val();
				if( $val == 'default') {
					$sidebarMetabox.show();
				} else {
					$sidebarMetabox.hide();
				}
			});
		}

		// Init hidePageSidebarMetaBox()
		hidePageSidebarMetaBox();

	});

})(jQuery);