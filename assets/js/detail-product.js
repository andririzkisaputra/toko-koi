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
                console.log(res.data.file_upload);
                res.data.file_upload.map(function(val, index){
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
        })
    }

    $('#more button').click(function() {
        limit = 0;
        data = [];
        get();
    });
});
