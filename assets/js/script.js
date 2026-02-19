$(document).ready(function(){
    loadSlider($('.nav-link.active').data('tab'));

    $('.nav-link').click(function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');

        let tab = $(this).data('tab');
        loadSlider(tab);
    });

    function loadSlider(tab){
        $.ajax({
            url : 'slider-data.php',
            type : 'POST',
            data : {tab:tab},
            success:function(response){
                $('.slider-content').html(response);

                let firstImg = $('.slide-item').first().data('image');
                $('#previewImage').attr('src','uploads/'+firstImg);
            }
        });
    }

    $(document).on('click','.slide-item',function(){
        let img = $(this).data('image');
        $('#previewImage').attr('src','uploads/'+img);
    });

    
});