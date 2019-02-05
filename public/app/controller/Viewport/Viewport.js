Ext.define('app.controller.Viewport.Viewport', {
    extend: 'Ext.app.Controller',
    views: [
        'Viewport.Navigator',
        'Viewport.Viewport',
        'mod.Inicio.view.Inicio'
    ],
    requires: [
        'mod.Sistema.store.Modules.Modules',
        'app.view.Viewport.template.Navigator'
    ],
    init: function () {
        this.control({
            'viewport button[action=logout]': {
                click: this.onLogoutButtonClick
            },
            'viewport Navigator': {
                refresh: this.onNavigatorRefresh,
                containerclick: this.onNavigatorContainerClick,
                afterrender: this.onNavigatorAfterRender,
                itemclick: this.onNavigatorItemClick
            }
        })
    },
    refs: [{
        ref: 'Navigator',
        selector: 'Navigator',
    }, {
        ref: 'currentModuleContent',
        selector: 'viewport #content'
    }],
    /**
     * Logout Button Click
     *
     * @param e
     * @param eOpts
     */
    onLogoutButtonClick: function (e, eOpts) {
        Ext.MessageBox.confirm({
            closable: false,
            title: 'Mensaje del Sistema',
            msg: '¿Realmente desea desconectarse?',
            icon: Ext.MessageBox.QUESTION,
            buttons: Ext.MessageBox.YESNO,
            fn: function (button) {
                if (button == 'yes') {
                    Ext.Ajax.request({
                        url: 'logout',
                        method: 'POST',
                        success: function () {
                            window.location.reload();
                        }
                    })
                }
            }
        })
    },
    /**
     * Navigator Refresh
     *
     * @param e
     * @param eOpts
     */
    onNavigatorRefresh: function (e, eOpts) {
        e.getSelectionModel().select(0);
    },
    /**
     * Navigator Container Click
     *
     * @param i
     * @param e
     * @param eOpts
     */
    onNavigatorContainerClick: function (i, e, eOpts) {
        i.getSelectionModel().select(i.getSelectionModel().getLastSelected());
    },
    /**
     * Navigator After Render
     *
     * @param e
     * @param eOpts
     */
    onNavigatorAfterRender: function (e, eOpts) {
        this.getNavigator().getStore().load().filter([
            {
                property: 'region',
                value: 1
            }
        ]);
    },
    /**
     * Navigator Item Click
     *
     * @param view
     * @param record
     * @param item
     * @param index
     * @param e
     * @param eOpts
     */
    onNavigatorItemClick: function (view, record, item, index, e, eOpts) {
        if (!this.getCurrentModuleContent().getComponent(record.get('url'))) {

            if (Ext.ClassManager.get('app.view.' + record.get('url'))) {
                switch (record.get('type')) {
                    case 'Window':
                        Ext.widget(record.get('url'), {});
                        break;
                    case 'Application':
                        this.getCurrentModuleContent().removeAll();
                        this.getCurrentModuleContent().add(Ext.create('app.view.' + record.get('url'), {}));
                        break;
                    default:
                        console.log('Unknown module type: ' + record.get('type'));
                        break;
                }
            } else {
                console.log('Unknown module: ' + record.get('url'));
            }
        }
    },
});