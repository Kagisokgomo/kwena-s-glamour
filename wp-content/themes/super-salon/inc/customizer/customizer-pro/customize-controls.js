( function( api ) {

	// Extends our custom "super-salon" section.
	api.sectionConstructor['super-salon'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );