(function($) {
    'use strict'
    get();

    function get() {
        let data = [];
        let subtotal = 0;
        let total = 0;
        $.ajax({
            url: 'config/frontend/detail-keranjang.php',
            method: 'POST', 
            dataType: 'json',
            success: function(res){
                res.cart.map(function(val, index){
                    subtotal = subtotal+parseInt(val.price);
                    total = total+parseInt(val.price);
                    data.push(
                        '<tr>'
                            +'<td><img src="assets/img/product/'+val.product.gambar+'" width="100"></td>'
                            +'<td>'+val.product.name+'</td>'
                            +'<td>'+val.product.sex+'</td>'
                            +'<td>'+val.product.quality+'</td>'
                            +'<td>'+val.product.size+' cm</td>'
                            +'<td>'
                                +'<a href="javascript:void(0)" onclick="minCart(this)" data-product="'+val.code_product+'" class="preview-link"><i class="bx bx-caret-left"></i></a>'
                                +'<span>'+val.qty+'</span>'
                                +'<a href="javascript:void(0)" onclick="maxCart(this)" data-product="'+val.code_product+'" class="preview-link"><i class="bx bx-caret-right"></i></a>'
                            +'</td>'
                            +'<td>'+formatRupiah(val.product.price, 'Rp ')+'</td>'
                            +'<td>'+formatRupiah(val.price, 'Rp ')+'</td>'
                            +'<td><button class="btn btn-sm btn-danger"><i class="bx bx-trash"></button></td>'
                        +'</tr>'
                    );
                })
                data = data.join('');
                data = data.toString();
                $('tbody').html(data);
                $('.subtotal').html(
                    '<b class="col-lg-6">SubTotal</b>'
                    +'<b class="col-lg-6">'+formatRupiah(subtotal.toString(), 'Rp ')+'</b>'
                );
                $('.total').html(
                    '<p class="col-lg-6">Total</p>'
                    +'<b class="col-lg-6">'+formatRupiah(total.toString(), 'Rp ')+'</b>'
                );
            }
        })
    }

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

})(jQuery);

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
