Ext.define('mod.Sistema.view.Sistema', {
    extend: 'Ext.panel.Panel',
    layout: 'fit',
    border: false,
    items: [{
        layout: 'border',
        title: 'Sistema',
        defaults: {
            padding: '1px',
        },
        items: [{
            xtype: 'panel',
            region: 'north',
            height: 120
        }, {
            xtype: 'panel',
            region: 'center',
            title: '2-2',
            flex: 1
        }]
    }]
});