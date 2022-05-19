(function($) {
    'use strict'
    get();

    function get() {
        let data = [];
        $.ajax({
            url: 'config/frontend/detail-keranjang.php',
            method: 'POST', 
            dataType: 'json',
            success: function(res){
                res.cart.map(function(val, index){
                    data.push(
                        '<tr>'
                            +'<td>Gambar</td>'
                            +'<td>'+val.name+'</td>'
                            +'<td>'+val.sex+'</td>'
                            +'<td>'+val.quality+'</td>'
                            +'<td>'+val.size+' cm</td>'
                            +'<td>'+val.qty+'</td>'
                            +'<td>Rp. 7.000</td>'
                            +'<td>Rp. 7.000</td>'
                            +'<td><button class="btn btn-sm btn-danger"><i class="bx bx-trash"></button></td>'
                        +'</tr>'
                    );
                })
                data = data.join('');
                data = data.toString();
                // $('.swiper-wrapper').html(data);
                console.log(res.cart);
            }
        })
    }

})(jQuery);