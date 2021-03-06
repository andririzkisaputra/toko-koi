(function($) {
    'use strict'
    let bank = [];
    get();

    function get() {
        $.ajax({
            url: 'config/frontend/detail-cart.php',
            method: 'POST', 
            dataType: 'json',
            success: function(res){
                if (res.cart) {
                    bank = res.payment;
                    paymentDetails(res.payment);
                    keranjangDetails(res.cart);
                } else {
                    let empty = '<tr class="text-center">'
                                    +'<td colspan="14">Keranjang Kosong</td>'
                                +'</tr>';
                    $('tbody').html(empty);
                    $('.data-info').html('');
                    $('.rincian').html('');
                }
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

    function paymentDetails(params) {
        let className = 'row d-flex justify-content-between align-items-center';
        let html = '<p>Pembayaran</p><hr>'
                +'<div class="'+className+'">'
                    +'<b class="width-50">Bank</b>'
                    +'<b class="width-50">'+params.bank+'</b>'
                +'</div><hr>'
                +'<div class="'+className+'">'
                    +'<b class="width-50">Nomor Rekening</b>'
                    +'<b class="width-50">'+params.number+'</b>'
                +'</div><hr>'
                +'<div class="'+className+'">'
                    +'<b class="width-50">Nama</b>'
                    +'<b class="width-50">'+params.name+'</b>'
                +'</div><hr>';
        $('.payment-details').html(html);
        listPayment(params.list_payment);
    }

    function listPayment(params) {
        let html = '';
        let data = [];
        params.map(function(val, index){
            data.push('<li class="bank btn-get-started" data-bank="'+val.code_bank+'">Bank '+val.bank+'</li>');
        })
        data = data.join('');
        data = data.toString();
        html = '<label id="more" class="dropdown d-flex flex-column align-items-center">'
                    +'<div class="btn-get-started dd-button">'
                        +'Pilih Pembayaran'
                    +'</div>'
                    +'<input type="checkbox" class="dd-input" id="test">'
                    +'<ul id="more" class="dd-menu">'
                        +data
                    +'</ul>'
                +'</label>';
        $('.bank-list').html(html);
    }

    function keranjangDetails(params) {
        let data = [];
        let subtotal = 0;
        let total = 0;
        params.map(function(val, index){
            subtotal = subtotal+parseInt(val.price);
            total = total+parseInt(val.price);
            data.push(
                '<tr>'
                    +'<td><img src="assets/img/product/'+val.product.gambar+'" width="100"></td>'
                    +'<td>'+val.product.name+'</td>'
                    +'<td>'+val.product.sex+'</td>'
                    +'<td>'+val.product.quality+'</td>'
                    +'<td>'+val.product.size+' cm</td>'
                    +'<td colspan="2">'
                        +'<a href="javascript:void(0)" data-product="'+val.code_product+'" class="min preview-link"><i class="bx bx-caret-left"></i></a>'
                        +'<span>'+val.qty+'</span>'
                        +'<a href="javascript:void(0)" data-product="'+val.code_product+'" class="max preview-link"><i class="bx bx-caret-right"></i></a>'
                    +'</td>'
                    +'<td colspan="2">'+formatRupiah(val.product.price, 'Rp ')+'</td>'
                    +'<td colspan="4">'+formatRupiah(val.price, 'Rp ')+'</td>'
                    +'<td><button class="btn btn-sm btn-danger" data-product="'+val.code_product+'" style="padding: 3px;"><i class="bx bx-trash"></button></td>'
                +'</tr>'
            );
        })
        data = data.join('');
        data = data.toString();
        $('tbody').html(data);
        rincianDetails(subtotal, total);
    }

    function rincianDetails(subtotal, total) {
        $('.subtotal').html(
            '<b class="width-50">SubTotal</b>'
            +'<b class="width-50">'+formatRupiah(subtotal.toString(), 'Rp ')+'</b>'
        );
        $('.total').html(
            '<p class="width-50">Total</p>'
            +'<b class="width-50">'+formatRupiah(total.toString(), 'Rp ')+'</b>'
        );
    }

    $(document).on('click', '.bank', function(e){
        let code_bank = $(this).attr('data-bank');
        $.ajax({
            url: 'config/frontend/select-payment.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                code_bank: code_bank,
            },
            success: function(res){
                bank = res;
                paymentDetails(res);
            }
        })
    });

    $(document).on('click', '.min', function(e){
        let product = $(this).attr('data-product');
        $.ajax({
            url: 'config/frontend/min-cart.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                product: product,
            },
            success: function(res){
                return location.reload();
            }
        })
    });

    $(document).on('click', '.max', function(e){
        let product = $(this).attr('data-product');
        $.ajax({
            url: 'config/frontend/max-cart.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                product: product,
            },
            success: function(res){
                return location.reload();
            }
        })
    });

    $(document).on('click', '.btn-danger', function(e){
        let product = $(this).attr('data-product');
        $.ajax({
            url: 'config/frontend/delete-cart.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                product: product,
            },
            success: function(res){
                return location.reload();
            }
        })
    });

    $(document).on('click', '.beli', function(e){
        let product = $(this).attr('data-product');
        $.ajax({
            url: 'config/frontend/proses-pesanan.php',
            method: 'POST', 
            dataType: 'json',
            success: function(res){
                // if (res) {
                //     alert('Berhasil dipesan, silahkan melakukan pembayaran!');
                //     return window.location = 'pesanan.php';
                // } else {
                //     alert('Gagal dipesan, silahkan coba sesaat lagi!');
                //     return location.reload();
                // }
            }
        })
    });
})(jQuery);
