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
                args.target = dijit.byId(args.target);
            }
            this.target = args.target;
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
            this.timeout = window.setTimeout(this.doXhr, 1000, {postValue:this.domNode.value, scope:this});
        },
        doXhr : function(args) {
            var scope = args.scope;
            var postData = {data : args.postValue};
            var xhrArgs = {
                content : postData,
                url     : '/eval.php',
                load    : function(response) {console.log(response); scope.target.innerHTML = response}
            }
            scope.xhr = dojo.xhrPost(xhrArgs);
        }
    });
}