module App.Helpers.Ajax{
    declare var $;
    export interface ICallCenter{
        objectToArray(obj: Object):Array<any>;
    }

    export class CallCenter implements ICallCenter{
        constructor(){}

        objectToArray = (obj: Object):Array<any> => {
            var out = [];
            var array = $.map( obj, function(value, index) {
                out.push(value)
                return out;
            });
            return out;
        }
    }
}