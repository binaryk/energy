;
var ComptechHelperAjax = function (options) {
    this.url = null;
    this.type = 'post';
    this.dataType = 'json';
    this._token = null;
    this.data = {};
    $.extend(this, options);
    this.data._token = this._token;
    this.onFinish = function (result) {
    };
    this.setUrl = function (url) {
        this.url = url;
        return this;
    };
    this.setData = function (key, value) {
        this.data[key] = value;
        return this;
    };
    this.setOnFinish = function (callback) {
        this.onFinish = callback;
        return this;
    };
    this.Request = function () {
        var that = this;
        $.ajax({
            url: this.url,
            type: this.type,
            dataType: this.dataType,
            data: this.data,
            success: function (result) {
                return that.onFinish(result);
            }
        });
    };
};
//# sourceMappingURL=Ajax.js.map