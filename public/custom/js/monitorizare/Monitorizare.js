/// <reference path="../binaryk/helpers/CallCenter.ts" />
/// <reference path="../binaryk/ui/Modal.ts" />
var App;
(function (App) {
    var Monitorizare;
    (function (_Monitorizare) {
        var Monitorizare = (function () {
            function Monitorizare(parameters) {
                var _this = this;
                this.parameters = parameters;
                this.init = function () {
                };
                this.drawChart = function (year) {
                    var out = [];
                    out.push("Luni");
                    out = out.concat((new App.Helpers.Ajax.CallCenter()).objectToArray(_this.parameters.data));
                    var chart2 = c3.generate({
                        bindto: '#chart_' + year,
                        data: {
                            columns: [
                                out
                            ],
                            type: 'bar',
                            labels: {
                                format: function (v, id, i, j) {
                                    return (new App.Monitorizare.Months()).months(i);
                                }
                            },
                            names: {
                                period: 'Checkup'
                            }
                        },
                        axis: {
                            x: {
                                type: 'category',
                                categories: (new App.Monitorizare.Months()).months(null)
                            }
                        },
                        bar: {
                            width: {
                                ratio: 0.5
                            }
                        }
                    });
                };
                this.handlers = function (year) {
                    var modal = new App.Ui.Modal({ 'id': '#frm_chart_lunar_' + year });
                    $('#frm_chart_modal_open_' + year).click(function (e) {
                        e.preventDefault();
                        modal.show();
                    });
                };
            }
            return Monitorizare;
        })();
        _Monitorizare.Monitorizare = Monitorizare;
        var Months = (function () {
            function Months() {
                this.months = function (i) {
                    var months = [
                        'Ianuarie',
                        'Februarie',
                        'Martie',
                        'Aprilie',
                        'Mai',
                        'Iunie',
                        'Iulie',
                        'August',
                        'Septembrie',
                        'Octombrie',
                        'Noiembrie',
                        'Decembrie',
                    ];
                    if (i === null) {
                        return months;
                    }
                    return months[i];
                };
            }
            return Months;
        })();
        _Monitorizare.Months = Months;
    })(Monitorizare = App.Monitorizare || (App.Monitorizare = {}));
})(App || (App = {}));
//# sourceMappingURL=Monitorizare.js.map