/* eslint-disable camelcase */
/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;

const {
	BaseControl,
	Button,
	ExternalLink,
	PanelBody,
	PanelRow,
	Placeholder,
	Spinner,
	ToggleControl
} = wp.components;

const {
	render,
	Component,
	Fragment
} = wp.element;

class App extends Component {
	constructor() {
		super( ...arguments );

		this.changeOptions = this.changeOptions.bind( this );

		this.state = {
			isAPILoaded: false,
			isAPISaving: false,
			demo_plugin_analytics_status: false,
			demo_plugin_analytics_key: ''
		};
	}

	componentDidMount() {
		wp.api.loadPromise.then( () => {
			this.settings = new wp.api.models.Settings();

			if ( false === this.state.isAPILoaded ) {
				this.settings.fetch().then( response => {
					this.setState( {
						demo_plugin_analytics_status: Boolean( response.demo_plugin_analytics_status ),
						demo_plugin_analytics_key: response.demo_plugin_analytics_key,
						isAPILoaded: true
					} );
				} );
			}
		} );
	}

	changeOptions( option, value ) {
		this.setState( { isAPISaving: true } );

		const model = new wp.api.models.Settings( {
			// eslint-disable-next-line camelcase
			[option]: value
		} );

		model.save().then( response => {
			this.setState( {
				[option]: response[option],
				isAPISaving: false
			} );
		} );
	}

	render() {
		if ( ! this.state.isAPILoaded ) {
			return (
				<Placeholder>
					<Spinner/>
				</Placeholder>
			);
		}

		return (
			<Fragment>
				<div className="demo-plugin-header">
					<div className="demo-plugin-container">
						<div className="demo-plugin-logo">
							<h1>{ __( 'Demo Plugin' ) }</h1>
						</div>
					</div>
				</div>

				<div className="demo-plugin-main">
					<PanelBody
						title={ __( 'Settings' ) }
					>
						<PanelRow>
							<BaseControl
								label={ __( 'Google Analytics Key' ) }
								help={ 'In order to use Google Analytics, you need to use an API key.' }
								id="demo-plugin-options-google-analytics-api"
								className="demo-plugin-text-field"
							>
								<input
									type="text"
									id="demo-plugin-options-google-analytics-api"
									value={ this.state.demo_plugin_analytics_key }
									placeholder={ __( 'Google Analytics API Key' ) }
									disabled={ this.state.isAPISaving }
									onChange={ e => this.setState( { demo_plugin_analytics_key: e.target.value } ) }
								/>

								<div className="demo-plugin-text-field-button-group">
									<Button
										isPrimary
										disabled={ this.state.isAPISaving }
										onClick={ () => this.changeOptions( 'demo_plugin_analytics_key', this.state.demo_plugin_analytics_key ) }
									>
										{ __( 'Save' ) }
									</Button>

									<ExternalLink href="#">
										{ __( 'Get API Key' ) }
									</ExternalLink>
								</div>
							</BaseControl>
						</PanelRow>

						<PanelRow>
							<ToggleControl
								label={ __( 'Track Admin Users?' ) }
								help={ 'Would you like to track views of logged-in admin accounts?.' }
								checked={ this.state.demo_plugin_analytics_status }
								onChange={ () => this.changeOptions( 'demo_plugin_analytics_status', ! this.state.demo_plugin_analytics_status ) }
							/>
						</PanelRow>
					</PanelBody>

					<PanelBody>
						<div className="demo-plugin-info">
							<h2>{ __( 'Got a question for us?' ) }</h2>

							<p>{ __( 'We would love to help you out if you need any help.' ) }</p>

							<div className="demo-plugin-info-button-group">
								<Button
									isSecondary
									target="_blank"
									href="#"
								>
									{ __( 'Ask a question' ) }
								</Button>

								<Button
									isSecondary
									target="_blank"
									href="#"
								>
									{ __( 'Leave a review' ) }
								</Button>
							</div>
						</div>
					</PanelBody>
				</div>
			</Fragment>
		);
	}
}

render(
	<App/>,
	document.getElementById( 'demo-plugin' )
);
