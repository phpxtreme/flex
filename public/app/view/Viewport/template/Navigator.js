Ext.define('app.view.Viewport.template.Navigator', {
    extend: 'Ext.XTemplate',
    constructor: function (config) {
        var html = [
            '<tpl for=".">',
                '<div class="thumb-wrap">',
                    '<div class="thumb">',
                        '<img src="app/modules/{name}/resource/{thumb}" />',
                    '</div>',
                    '<span>{name}</span>',
                '</div>',
            '</tpl>'
        ];
        this.callParent(html);
    }
});