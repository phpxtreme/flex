Ext.define('mod.Sistema.store.Modules.Modules', {
    extend: 'Ext.data.Store',
    model: 'mod.Sistema.model.Modules.Modules',
    proxy: {
        type: 'ajax',
        url: 'sistema/modules/load',
        reader: {
            type: 'json'
        },
        actionMethods: {
            read: 'POST'
        },
    }
});