const { BaseControl, Button, PanelBody, PanelRow, Placeholder, Spinner, Text, TextControl } = wp.components;
const { render, Component, Fragment } = wp.element;
const { __ } = wp.i18n;

import './admin.scss';
import { Notice } from './Notice';

class App extends Component {
  constructor(props) {
    super(...arguments);

    this.showNotice = this.showNotice.bind(this);
    this.hideNotice = this.hideNotice.bind(this);
    this.sampleSettingChange = this.sampleSettingChange.bind(this);
    this.updateOptions = this.updateOptions.bind( this );

    this.state = {
      isAPILoaded: false,
      isAPISaving: false,
      isEdited: false,
      isSaving: false,
      noticeMessage: '',
      settings: { },
      showNotice: false,
    };
  };

  componentDidMount() {
    wp.api.loadPromise.then(() => {
      // Get settings
      this.settings = new wp.api.models.Settings();
      if (false === this.state.isAPILoaded) {
        this.settings.fetch().then(response => {
          const productVariations = response.BSD_Plugin_Boilerplate_sample_setting ? response.BSD_Plugin_Boilerplate_sample_setting : null;
          
          this.setState({
            settings: {
              BSD_Plugin_Boilerplate_sample_setting: productVariations
            },
            isAPILoaded: true
          });
          
        });
      }
    });
  }

  showNotice(message) {
    this.setState({
      showNotice: true,
      noticeMessage: message,
    });
  }

  hideNotice() {
    this.setState({ showNotice: false });
  }

  sampleSettingChange(newVal) {
    this.setState({
      isEdited: true,
      settings: {
        ...this.state.settings,
        BSD_Plugin_Boilerplate_sample_setting: newVal
      }
    })
  }

  updateOptions( showNotice = true ) {
    this.setState({ isAPISaving: true });

    // Delete empty settings keys (prevents 500 error when settings don't change)
    for ( const key in this.state.settings ) {
      if ( this.state.settings[ key ] === null ) {
        delete this.state.settings[ key ];
      }
    }

    // Create WordPress settings model
    const model = new wp.api.models.Settings( {
      ...this.state.settings,
    });
    
    // Save to database
    model
      .save()
      .then(response => {
        this.setState({
          settings: { ...response },
          isAPISaving: false,
          isEdited: false,
        });

        if ( showNotice ) {
          this.showNotice(
            __( 'Setting(s) updated', 'bsd-plugin-boilerplate' )
          );
        }
      })
      .fail( ( response ) => {
        if ( showNotice ) {
          this.showNotice( response.statusText );
        }
      });
  } 
  
  render() {
    if (!this.state.isAPILoaded) {
      return (
        <Placeholder>
          <Spinner/>
        </Placeholder>
      );
    }
    return (
      <Fragment>
        <div className="bsd-plugin-boilerplate-header">
          <div className="bsd-plugin-boilerplate-container">
            <div className="bsd-plugin-boilerplate-logo">
              <h1>{ __( 'BSD Plugin Boilerplate' ) }</h1>
            </div>
          </div>
        </div>

        <Notice 
          showNotice={ this.state.showNotice }
          hideNotice={ this.hideNotice }
          message={ this.state.noticeMessage }
        />

        <div className="bsd-plugin-boilerplate-main">
          <PanelBody title={ __( 'Settings', 'bsd-plugin-boilerplate' ) }>
            <PanelRow>
              <TextControl
                label={ __('Sample Setting', 'bsd-plugin-boilerplate') }
                help={ __('Helper text goes here') }
                className='bsd-plugin-boilerplate-text-field'
                value={ this.state.settings.BSD_Plugin_Boilerplate_sample_setting }
                disabled={ this.state.isAPISaving }
                onChange={ e => this.sampleSettingChange(e) }
                size={'small'}
                type={'text'}
              />
            </PanelRow>
            <PanelRow>
              <Button
                isPrimary
                disabled={ this.state.isSaving || !this.state.isEdited }
                isBusy={ this.state.isSaving || this.state.checkingApi }
                onClick={ this.updateOptions }
              >
                {__('Save', 'bsd-plugin-boilerplate')}
              </Button>
            </PanelRow>
          </PanelBody>
        </div>      
      </Fragment>
    );
  }
}

render(
  <App/>,
  document.getElementById( 'bsd-plugin-boilerplate-settings' )
);