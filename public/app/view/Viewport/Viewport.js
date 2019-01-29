Ext.define('app.view.Viewport.Viewport', {
    extend: 'Ext.container.Viewport',
    layout: 'border',
    initComponent: function () {
        this.items = [{
            xtype: 'container',
            id: 'app-header',
            region: 'north',
            layout: {
                type: 'hbox',
                align: 'middle'
            },
            items: [{
                xtype: 'image',
                id: 'app-header-logo',
                src: 'images/1.png',
                style: {
                    'margin-left': '15px'
                }
            }, {
                xtype: 'component',
                id: 'app-header-title',
                html: 'Flex',
                flex: 1
            }, {
                xtype: 'button',
                action: 'logout',
                iconCls: 'logout',
                text: 'Desconectar',
                style: {
                    'margin-right': '15px'
                }
            }]
        }, {
            xtype: 'panel',
            region: 'west',
            layout: 'fit',
            border: false,
            items: [{
                id: 'navigator',
                xtype: 'Navigator',
                autoScroll: true,
                border: false,
                width: 120
            }]
        }, {
            id: 'content',
            xtype: 'panel',
            region: 'center',
            layout: 'fit',
            border: false,
            items: Ext.create('mod.Inicio.view.Inicio', {})
        }];
        this.callParent(arguments);
    }
});