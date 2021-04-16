const { Snackbar } = wp.components;

const Notice = ( props ) => {
  if (props.showNotice) {
    return (
      <div className='components-snackbar-list components-editor-notices__snackbar' id='bsd-plugin-boilerplate-notice'>
        <Snackbar
          className={ props.showNotice ? 'notification-shown' : 'notification-hidden' }
          onRemove={ () => props.hideNotice() }
        >
          { props.message }
        </Snackbar>
      </div>
    );
  }

  return null;
};

export { Notice };