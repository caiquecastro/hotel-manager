import 'bootstrap';
import Vue from 'vue';
import jQuery from 'jquery';
import VueNoty from 'vuejs-noty';
import RoomTypeForm from './components/RoomTypeForm';
import 'jquery-mask-plugin';
import 'vuejs-noty/dist/vuejs-noty.css'

Vue.use(VueNoty);
Vue.component('room-type-form', RoomTypeForm);

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
    // $(".js-price").maskMoney({
    //     prefix: 'R$ '
    // });
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
        var roomNightsChart = new Chart(ctx).Line(data, options);
    }

    $("#barcode-search").blur(function () {
        var barcode = $(this).val();
        $.ajax({
            method: "GET",
            url: "/inventory/" + barcode
        }).done(function (data) {
            $("#name").val(data.name);
            $("#product_id").val(data.id);
            $("#price").val(data.price);
        });
    });

    $("body").on("blur", "#amount", function() {
        var price = $("#price").val();
        var amount = $(this).val();
        $("#total").val(price*amount);
    });

    $("body").on("click", "#save-consumption", function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "/consumption",
            data: {
                _token: $("[name=_token]").val(),
                booking_id: $("#booking_id").val(),
                product_id: $("#product_id").val(),
                price: $("#price").val(),
                amount: $("#amount").val()
            }
        }).done(function () {
            $("#barcode-search").val('');
            $("#name").val('');
            $("#product_id").val('');
            $("#price").val('');

            $("#modal-consumption").modal('close');
        });
    });

    $(".open-consumption").click(function() {
        var booking_id = $(this).data("id");

        $.ajax({
            method: "GET",
            url: "/bookings/" + booking_id
        }).done(function (data) {
            $("#booking_id").val(data.id);
            $("#modal-consumption").modal();
        });
    });
}(window, document, jQuery));
