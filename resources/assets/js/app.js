import 'bootstrap';
import Vue from 'vue';
import jQuery from 'jquery';
import VueNoty from 'vuejs-noty';
import RoomTypeForm from './components/RoomTypeForm';
import ConsumptionForm from './components/ConsumptionForm';
import 'jquery-mask-plugin';
import 'vuejs-noty/dist/vuejs-noty.css'

Vue.use(VueNoty);
Vue.component('room-type-form', RoomTypeForm);
Vue.component('consumption-form', ConsumptionForm);

window.$ = jQuery;

const app = new Vue({
    el: '#app',
});

;(function (win, doc, $, undefined) {
    var phoneMask, phoneMaskOptions;

    phoneMask = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    phoneMaskOptions = {
        onKeyPress: function (val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $(".js-date").mask("99/99/9999");
    $('.js-telefone').mask(phoneMask, phoneMaskOptions);

    $("#print-page").on("click", function () {
        win.print();
    });

    var data = {
        labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [66, 59, 80, 81, 56, 55, 40]
            }
        ]
    }, options = {
        bezierCurve: false
    };

    $('.js-parse-price').on('submit', function(e) {
        $(this).find('.js-price').each(function () {
            $(this).val($(this).maskMoney('unmasked')[0]);
        });
    });

    var chartRoom = doc.getElementById("chart-room");

    if (chartRoom) {
        var ctx = chartRoom.getContext("2d");
        new Chart(ctx).Line(data, options);
    }

    $(".open-consumption").click(function() {
        $("#modal-consumption").modal();
    });
}(window, document, jQuery));
