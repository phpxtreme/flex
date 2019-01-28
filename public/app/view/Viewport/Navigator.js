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
                url: 'modulos/get',
                reader: {
                    type: 'json'
                }
            }
        });
        this.callParent(arguments);
        this.store.sort();
    }
});