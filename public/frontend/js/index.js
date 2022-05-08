

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "#f7f7f7";

}

var slideImg = document.getElementById("slideImg");
var images = new Array(
    "images/iphone132.png",
    "images/laptop1.png",
    "images/accessories1.png",

);
var len = images.length;
var i = 0;

function slider() {
    if (i > len - 1) {
        i = 0;
    }
    slideImg.src = images[i];
    i++;
    setTimeout('slider()', 3000);
}
// Ajax

$(function () {
    $('.btnAddCart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.product_qty').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
            success: function (response) {
               swal(response.status,"success");
                 window.location.reload();
            }
        });

    });
});


$(function () {
    $('.categoryaddtocart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.category_data').find('.category_id').val();
        var product_qty = "1";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
            success: function (response) {

              swal("",response.status,"success");
                window.location.reload();

            }
        });

    });
});
$(function () {
    $('.phoneaddtocart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.phone_data').find('.phone_id').val();
        var product_qty = "1";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
            success: function (response) {

              swal("",response.status,"success");
                window.location.reload();

            }
        });

    });
});
$(function () {
    $('.laptopaddtocart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.laptop_data').find('.laptop_id').val();
        var product_qty = "1";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
            success: function (response) {
               swal("",response.status,"success");
                window.location.reload();

            }
        });

    });
});
$(function () {
    $('.assesoriesaddtocart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.assesories_data').find('.assesories_id').val();
        var product_qty = "1";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,

            },
            success: function (response) {
               swal("",response.status,"success");
                window.location.reload();

            }
        });

    });
});

$(function () {
    $('.btnremovecart').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.cart_data').find('.id_product').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "delete-cart-item",
            data: {
                'product_id': product_id,
            },
            success: function (response) {
              window.location.reload();


            }
        });
    });
});


$(function () {
    $('.update-qty').change(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.cart_data').find('.id_product').val();
        var product_qty = $(this).closest('.cart_data').find('.qty_product').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "update-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                window.location.reload();
                //swal(response.status)
            }
        });


    });
});

$(document).ready(function () {
    loadcart();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
function loadcart(){

    $.ajax({
        type: "GET",
        url: "/load-cart-data",
        success: function (response) {
            $('.cartcount').html('');
            $('.cartcount').html(response.count);

        }
    });
}
