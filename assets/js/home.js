$(document).ready(function() {
    const bgModal = document.querySelector('.bg-modal');
    const openModal = document.querySelector('.open-modal');
    const closeModal = document.querySelector('.close-modal');

    openModal.addEventListener('click', function() {
        bgModal.classList.add('show');
    });

    closeModal.addEventListener('click', function() {
        bgModal.classList.remove('show');
    });

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
                let info = '';
                res.data.map(function(val, index){
                    if (user) {
                        info = '<a href="create-cart.php?prodact='+val.code_product+'" class="preview-link"><i class="bx bx-cart"></i></a>'
                            +'<a href="product-details.php?prodact='+val.code_product+'" class="details-link"><i class="bx bx-spreadsheet"></i></a>';
                    } else {
                        info = '<a href="product-details.php?prodact='+val.code_product+'" class="preview-link"><i class="bx bx-spreadsheet"></i></a>';
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
