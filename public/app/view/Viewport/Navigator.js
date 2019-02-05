Ext.define('app.view.Viewport.Navigator', {
    extend: 'Ext.view.View',
    alias: 'widget.Navigator',
    uses: 'Ext.data.Store',
    overItemCls: 'x-view-over',
    itemSelector: 'div.thumb-wrap',
    tpl: Ext.create('app.view.Viewport.template.Navigator', {}),
    store: Ext.create('mod.Sistema.store.Modules.Modules', {}),
});