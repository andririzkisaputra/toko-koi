$(document).ready(function() {
    let img = '';
    let data = [];
    let base_url = window.location.href.split('/');
    base_url = base_url[base_url.length-1].split('?');
    let product = base_url[1].split('=')[1];
    get();
    function get() {
        $.ajax({
            url: 'config/frontend/detail-product.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                product: product,
            },
            success: function(res){
                console.log(res);
                get_file_upload(res.data.file_upload);
                get_product(res.data.product);
            }
        })
    }

    function get_file_upload(file_upload) {
        data = [];
        file_upload.map(function(val, index){
            if (val.type == 'img') {
                img = '<img src="assets/img/product/'+val.name+'">'
            } else {
                img = '<video width="100%" height="100%" controls>'
                        +'<source  src="assets/video/'+val.name+'" type="video/mp4">'
                    +'</video>'
            }
            data.push(                    
                '<div class="swiper-slide">'
                    +img
                +'</div>'
            )
        })
        data = data.join('');
        data = data.toString();
        $('.swiper-wrapper').html(data);
    }

    function get_product(product) {
        let cart = '';
        data = [];
        product.map(function(val, index){
            if (user) {
                cart = '<div>'
                    +'<a href="product-details.php?prodact='+val.code_product+'" class="cart-detail"><i class="bx bx-cart"></i></a>'
                +'</div>'
            }
            data.push(          
                '<div class="portfolio-info">'
                    +cart
                    +'<h3>Detail</h3>'
                    +'<ul>'
                        +'<li><strong>Nama</strong>: '+val.name+'</li>'
                        +'<li><strong>Harga</strong>: '+formatRupiah(val.price, 'Rp ')+'</li>'
                        +'<li><strong>Stok</strong>: '+val.stock+'</li>'
                        +'<li><strong>Tanggal Produk</strong>: '+moment(val.created_at).format('DD MMMM YYYY')+'</li>'
                    +'</ul>'
                +'</div>'
                +'<div class="portfolio-description">'
                    +'<h2>Keterangan</h2>'
                    +'<p>'+val.description+'</p>'
                +'</div>'
            )
        })
        data = data.join('');
        data = data.toString();
        $('.details').html(data);
    }

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

});
