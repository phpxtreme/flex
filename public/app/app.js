Ext.ariaWarn = Ext.emptyFn;
Ext.Loader.setConfig({
    enabled: !0,
    paths: {
        app: "app",
        mod: "app/modules"
    }
});

Ext.Ajax.on({
    beforerequest: function (connection, request, opts) {
        if (request.method == 'POST') {
            Ext.Ajax.setDefaultHeaders({
                'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").content
            });
        }
    }
});

Ext.Ajax.request({
    method: 'POST',
    url: "sistema/modules/read",
    success: function (response, opts) {
        // TODO: This!
    }
});