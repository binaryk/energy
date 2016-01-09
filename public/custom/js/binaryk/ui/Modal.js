var App;
(function (App) {
    var Ui;
    (function (Ui) {
        var Modal = (function () {
            function Modal(parameters) {
                var _this = this;
                this.parameters = parameters;
                this.showMessages = function (messages, type) {
                    var html = '';
                    for (var i = 0; i < messages.length; i++) {
                        html += messages[i] + '<br/>';
                    }
                    $(_this.parameters.id + ' .modal-body').append('<div class="alert alert-' + type + '">' + html + '</div>');
                };
                this.show = function (title, body, footer) {
                    if (typeof title === 'string') {
                        _this.parameters.title = title;
                    }
                    if (typeof body === 'string') {
                        _this.parameters.body = body;
                    }
                    if (typeof footer === 'string') {
                        _this.parameters.footer = footer;
                    }
                    $(_this.parameters.id + ' .modal-title').html(_this.parameters.title);
                    $(_this.parameters.id + ' .modal-body').html(_this.parameters.body);
                    $(_this.parameters.id + ' .modal-footer').html(_this.parameters.footer);
                    $(_this.parameters.id).modal('show');
                };
                this.hide = function () {
                    $(_this.parameters.id).modal('hide');
                };
            }
            return Modal;
        })();
        Ui.Modal = Modal;
    })(Ui = App.Ui || (App.Ui = {}));
})(App || (App = {}));
//# sourceMappingURL=Modal.js.map