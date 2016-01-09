var App;
(function (App) {
    var Helpers;
    (function (Helpers) {
        var Ajax;
        (function (Ajax) {
            var CallCenter = (function () {
                function CallCenter() {
                    this.objectToArray = function (obj) {
                        var out = [];
                        var array = $.map(obj, function (value, index) {
                            out.push(value);
                            return out;
                        });
                        return out;
                    };
                }
                return CallCenter;
            })();
            Ajax.CallCenter = CallCenter;
        })(Ajax = Helpers.Ajax || (Helpers.Ajax = {}));
    })(Helpers = App.Helpers || (App.Helpers = {}));
})(App || (App = {}));
//# sourceMappingURL=CallCenter.js.map