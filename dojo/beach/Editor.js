if(!dojo._hasResource["beach.Editor"]){
    dojo._hasResource["beach.Editor"]=true;
    dojo.require('dijit._Widget');
    dojo.provide('beach.Editor');
    dojo.declare('beach.Editor', [dijit._Widget], {
        timeout : null,
        xhr : null,
        target : null,
        constructor : function(args, node) {
            if ('string' == typeof node) {
                node = dojo.byId(node);
            }
            this.domNode = node;
            if ('string' == typeof args.target) {
                args.target = dojo.byId(args.target);
            }
            this.targat = args.targat;
            dojo.connect(this.domNode, 'onkeyup', this, this._onKeyUp);
            dojo.connect(this.domNode, 'onchange', this, this._onChange);
        },
        _onKeyUp : function() {
            this.set();
        },
        _onChange : function() {
            this.set();
        },
        set : function() {
            if (this.timeout) {
                window.clearTimeout(this.timeout);
            }
            this.timeout = window.setTimeout(dojo.hitch(this,this.doXhr), 1000);
        },
        doXhr : function(args) {
            var postData = {data:this.domNode.value};
            var xhrArgs = {
                content : postData,
                url     : '/eval.php',
                load    : dojo.hitch(this, function(response) {
                    this.target.innerHTML = response;
                })
            };
            this.xhr = dojo.xhrPost(xhrArgs);
        }
    });
}