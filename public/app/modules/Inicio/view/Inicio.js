Ext.define('mod.Inicio.view.Inicio', {
    extend: 'Ext.panel.Panel',
    layout: 'fit',
    border: false,
    items: [{
        layout: 'border',
        title: 'Inicio',
        defaults: {
            padding: '1px',
        },
        items: [{
            xtype: 'panel',
            region: 'west',
            title: '1-1',
            flex: 1
        }, {
            xtype: 'panel',
            region: 'center',
            title: '2-2',
            flex: 1
        }, {
            xtype: 'panel',
            region: 'south',
            title: 'Módulos',
            flex: 1
        }]
    }]
});