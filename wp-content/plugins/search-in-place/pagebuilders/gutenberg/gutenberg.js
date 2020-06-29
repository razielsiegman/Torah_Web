jQuery(function(){
	( function( blocks, element ) {
		var el = element.createElement,
			InspectorControls = wp.blockEditor.InspectorControls,
			ServerSideRender = wp.serverSideRender;

		/* Plugin Category */
		blocks.getCategories().push({slug: 'searchinplace', title: 'Search in Place'});

		/* ICONS */
		const iconSIP = el('img', { width: 20, height: 20, src:  "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNui8sowAAAF3SURBVDiNrZW/LwRBFMc/Iwr6MSQnOQ0alWskJBdqcw2V5CIR7VU0/gLV/QUoREIjFENLJCQaf8DRkJDI2KgVklHsWzl7a9eP+zbfzJu3n7w3My+rQgh0U70ASqnPgHa+BtSACjAK3AE3wHFkzWkeLISACiGglEI7r4BdoJ7zzR6wHFmT2VYIgZ629bbA3oCGVNcv3pB4HdjKq1KFEBg4eZkFzoB3YCqy5iadqJ2vANfExzQXWXOeV+GqeDMLBiDxZiq/QwmwKn6Y107bfvW7hAQ4KH5bAGyJDxUBn8XHCoDj4q9FwAvxxQLggnjHhaSB2+Jr2vnJrESJr8uymZUDfHnYO8AK8XvbAE6AR2AYmAc2gT7gILJmKQv220kJwBFx2w/ATGTN47fAttZqgCWe5QkJ7wObkTUt7fw9UM6CZgKLpJ0vA1dAKQ1Nz/KPFFnzAEwDT1LppXZ+ONn/NbAI+idgBlQRX1rc93+knR/RzpcSlur2L+ADPbua8GEjZ9cAAAAASUVORK5CYII=" } );

		blocks.registerBlockType( 'searchinplace/sip', {
			title: 'Search in Place',
			icon: iconSIP,
			category: 'searchinplace',
			supports: {
				customClassName: false,
				className: false
			},

			attributes: {
				search_in_page : {
					type 	: 'integer',
					default : 0
				}
			},

			edit: function( props ){
				var focus = props.isSelected,
					children = [
						el(
							ServerSideRender,
							{
								key : 'sip_server',
								block: 'searchinplace/sip',
								attributes: props.attributes,
							}
						)
					];


				if(!!focus)
				{
					children.push(
						el(
							InspectorControls,
							{
								key: 'sip_inspector'
							},
							[
								el(
									'input',
									{
										type 	: 'checkbox',
										key 	: 'sip_search_in_page',
										checked	: (props.attributes.search_in_page == 1),
										onChange: function(evt){
											props.setAttributes(
												{search_in_page: (evt.target.checked ? 1 : 0)}
											);
										},
									},
								),
								el(
									'label',
									{
										key : 'sip_label'
									},
									'Search in current page only'
								),
							]
						)
					);
				}

				return 	children;
			},

			save: function( props ) {
				var shortcode = '[search-in-place-form';
				if(props.attributes.search_in_page) shortcode += ' in_current_page="1"';
				shortcode += ']';
				return el( 'div', null, shortcode );
			}
		});
	} )(
		window.wp.blocks,
		window.wp.element
	);
});