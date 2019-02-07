Ext.define('mod.Sistema.store.Modules.Modules', {
    extend: 'Ext.data.Store',
    model: 'mod.Sistema.model.Modules.Modules',
    proxy: {
        type: 'ajax',
        url: 'sistema/modules/modules',
        reader: {
            type: 'json'
        },
        actionMethods: {
            read: 'POST'
        },
    }
});