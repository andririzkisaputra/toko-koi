$(document).ready(function() {
    let limit = 6;
    let data = [];
    get();
    function get() {
        $.ajax({
            url: 'config/frontend/proses.php',
            method: 'POST', 
            dataType: 'json',
            data: {
                limit: limit,
            },
            success: function(res){
                (res.count > limit) ? $('#more button').show() : $('#more button').hide();
                res.data.map(function(val, index){
                    data.push(
                    '<div class="col-lg-4 col-md-6 portfolio-item filter-card">'
                        +'<div class="portfolio-img"><img src="assets/img/product/'+val.name+'" class="img-fluid" alt=""></div>'
                        +'<div class="portfolio-info">'
                            +'<h4>'+val.name_product+'</h4>'
                            +'<p>'+val.description.substring(0, 45)+'...</p>'
                            +'<a href="create-cart.php" class="preview-link"><i class="bx bx-cart"></i></a>'
                            +'<a href="portfolio-details.php" class="details-link"><i class="bx bx-spreadsheet"></i></a>'
                        +'</div>'
                    +'</div>'
                    )
                })
                data = data.toString();
                console.log(data);
                $('.portfolio-container').html(data);
            }
        })
    }

    $( "#more button" ).click(function() {
        limit = 0;
        data = [];
        $('.portfolio-container').html(data);
        get();
    });
});
