/// <reference path="../binaryk/helpers/CallCenter.ts" />
/// <reference path="../binaryk/ui/Modal.ts" />
module App.Monitorizare{
    declare var $;
    declare var _config;
    declare var c3;

    export class Monitorizare{

        constructor(public parameters){}

        init = ():void =>{
        }

        drawChart = (year?):void => {
            var out = [];
            out.push("Luni");
            out = out.concat((new App.Helpers.Ajax.CallCenter()).objectToArray(this.parameters.data));
            var chart2 = c3.generate({
                bindto: '#chart_'+year,
                data: {
                    columns: [
                        out
                    ],
                    type: 'bar',
                    labels: {
                        format: function (v, id, i, j) {
                            return (new App.Monitorizare.Months()).months(i);
                        }
                    }
                    ,
                    names: {
                        period: 'Checkup'
                    }
                },
                axis: {
                    x:{
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
        }

        handlers = (year?):void => {
            var modal  = new App.Ui.Modal({'id' : '#frm_chart_lunar_'+year});
            $('#frm_chart_modal_open_'+year).click(function(e){
                e.preventDefault();
                modal.show();
            });
        }


    }

    export class Months{
        months = (i?: number):any => {
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
            if(i === null){
                return months;
            }
            return months[i];
        }
    }


}