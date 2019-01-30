Ext.define('app.view.Viewport.Navigator', {
    extend: 'Ext.view.View',
    alias: 'widget.Navigator',
    uses: 'Ext.data.Store',
    overItemCls: 'x-view-over',
    itemSelector: 'div.thumb-wrap',
    loadMask: false,
    tpl: Ext.create('app.view.Viewport.template.Navigator'),
    initComponent: function () {
        this.store = Ext.create('Ext.data.Store', {
            autoLoad: true,
            fields: ['name', 'thumb', 'url', 'type'],
            proxy: {
                type: 'ajax',
                url: 'sistema/modules/read',
                reader: {
                    type: 'json',
                },
                actionMethods: {
                    read: 'POST'
                },
                extraParams: {
                    filter: Ext.encode({
                        region: 1,
                        active: true
                    })
                }
            }
        });
        this.callParent(arguments);
        this.store.sort();
    }
});