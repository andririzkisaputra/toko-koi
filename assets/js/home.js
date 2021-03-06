$(document).ready(function() {
    let limit = 6;
    let data = [];
    get();
    function get() {
        $.ajax({
            url: 'config/frontend/list-product.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                limit: limit,
            },
            success: function(res){
                let info;
                res.data.map(function(val, index){
                    if (user) {
                            if (val.qty) {
                                info = '<a href="javascript:void(0)" onclick="minCart(this)" data-product="'+val.code_product+'" class="preview-link"><i class="bx bx-caret-left"></i></a>'
                                    +'<a href="javascript:void(0)" class="preview-link"><span>'+val.qty+'</span></a>'
                                    +'<a href="javascript:void(0)" onclick="maxCart(this)" data-product="'+val.code_product+'" class="preview-link"><i class="bx bx-caret-right"></i></a>';
                            } else {
                                info = '<a href="config/frontend/create-cart.php?product='+val.code_product+'" class="preview-link"><i class="bx bx-cart"></i></a>';
                            }
                            info += '<a href="product-details.php?product='+val.code_product+'" class="details-link"><i class="bx bx-spreadsheet"></i></a>';
                    } else {
                        info = '<a href="product-details.php?product='+val.code_product+'" class="preview-link"><i class="bx bx-spreadsheet"></i></a>';
                    }
                    data.push(
                        '<div class="product-item product-app" style="background-image: url(assets/img/product/'+val.name+'); padding: 0px;">'
                            +'<div class="product-info">'
                                +'<h4>'+val.name_product+'</h4>'
                                +'<p>'+val.description.substring(0, 40)+'...</p>'
                                +info
                            +'</div>'
                        +'</div>'
                    )
                })
                data = data.join('');
                data = data.toString();
                $('.product').html(data);
                (res.count > limit && limit != 0) ? $('#more button').show() : $('#more button').hide();
            }
        })
    }
    $('#more button').click(function() {
        limit = 0;
        data = [];
        get();
    });
});

function minCart(data) {
    $.ajax({
        url: 'config/frontend/min-cart.php',
        method: 'POST', 
        dataType: 'json',
        data: {
            product: $(data).data("product"),
        },
        success: function(res){
            return location.reload();
        }
    })
}

function maxCart(data) {
    $.ajax({
        url: 'config/frontend/max-cart.php',
        method: 'POST', 
        dataType: 'json',
        data: {
            product: $(data).data("product"),
        },
        success: function(res){
            return location.reload();
        }
    })
}
