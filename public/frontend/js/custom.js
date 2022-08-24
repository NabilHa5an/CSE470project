// increment and decrement of the product
$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });
    $(".increase-btn").click(function (e) {
        e.preventDefault();

        var value_inc = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(value_inc, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 12) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });
    $(".decrease-btn").click(function (e) {
        e.preventDefault();

        var value_dec = $(this).closest(".product_data").find(".qty-input").val();
        var value = parseInt(value_dec, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success: function (response) {
                // setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();
        data={
            'prod_id':prod_id,
            'prod_qty':qty,
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    });
});
