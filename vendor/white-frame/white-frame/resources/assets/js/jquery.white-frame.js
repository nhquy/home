;(function ($, window, document, undefined) {
    var jWhiteFrame = {
        options: {

        },
        configure: function (options) {
            this.options = $.extend({}, this.options, options);

            return this;
        },
        dom: {
            readyHandlers: [],
            ready: function(handler) {
                this.readyHandlers.push(handler);
            },
            handle: function(dom) {
                for(var i= 0; i < this.readyHandlers.length; i++) {
                    this.readyHandlers[i](dom);
                }
            }
        }
    };

    $.jwf = function (name) {
        return jWhiteFrame[name];
    };
})(jQuery, window, document);