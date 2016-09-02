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
    $(".js-cpf").mask("999.999.999-99");
    $(".js-cnpj").mask("99.999.999/9999-99");
    $(".js-price").maskMoney({
        prefix: 'R$ '
    });
    $('.js-telefone').mask(phoneMask, phoneMaskOptions);

    $("input[name=person_type]").on("change", toggleCustomerForm);

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
            url: "/stock/" + barcode
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

    $("input[name=person_type]").find(":checked").each(function () {
        toggleCustomerForm();
    });

    function toggleCustomerForm() {
        var current_val = $(this).val();

        if (current_val.indexOf('LegalPerson') > 0) {
            $(".row-cpf").attr("hidden", true);
            $("#cpf").attr("disabled", true);

            $(".row-birthdate").attr("hidden", true);
            $("#birthday").attr("disabled", true);

            $(".row-gender").attr("hidden", true);
            $("input[name=gender]").attr("disabled", true);

            $(".row-cnpj").attr("hidden", false);
            $("#cnpj").attr("disabled", false);
        } else {
            $(".row-cnpj").attr("hidden", true);
            $("#cnpj").attr("disabled", true);

            $(".row-cpf").attr("hidden", false);
            $("#cpf").attr("disabled", false);

            $(".row-birthdate").attr("hidden", false);
            $("#birthday").attr("disabled", false);

            $(".row-gender").attr("hidden", false);
            $("input[name=gender]").attr("disabled", false);
        }
    }
}(window, document, jQuery));