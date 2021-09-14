$(function() {
    var wallet_casembrapa = $('.wallet_casembrapa');
    var form_casembrapa  = $('#casembrapa_save_digital_wallet');
    var div_download_wallet_casembrapa = $('.div_download_wallet_casembrapa');
    var div_loading_wallet_casembrapa = $('.div_loading_wallet_casembrapa');
    var img_download_wallet_casembrapa = $('.img_download_wallet_casembrapa');
    var exists_wallet_img_casembrapa = $('.exists_wallet_img_casembrapa');

    var wallet_cassi = $('.wallet_cassi');
    var form_cassi  = $('#cassi_save_digital_wallet');
    var div_download_wallet_cassi = $('.div_download_wallet_cassi');
    var div_loading_wallet_cassi = $('.div_loading_wallet_cassi');
    var img_download_wallet_cassi = $('.img_download_wallet_cassi');
    var exists_wallet_img_cassi = $('.exists_wallet_img_cassi');

    if (wallet_casembrapa.length > 0 && exists_wallet_img_casembrapa.length == 0) {
        html2canvas(wallet_casembrapa[0], {scale: 1}).then(function(canvas) {
            var img = canvas.toDataURL('image/jpeg', 1);
            // document.body.appendChild(canvas);
            // console.log(img);
    
            var _token = form_casembrapa.find("input[name='_token']").val();
            var id_casembrapa_wallet = form_casembrapa.find("input[name='id_casembrapa_wallet']").val();
            $.post(form_casembrapa.attr('action'), {
                _token: _token,
                img: img,
                id_casembrapa_wallet: id_casembrapa_wallet,
            }, function(data) {
            }).done(function(data) {
                var href_img_download_wallet_casembrapa = img_download_wallet_casembrapa.attr('href');
                
                // console.log(data, href_img_download_wallet_casembrapa_casembrapa);
                div_download_wallet_casembrapa.css('display', 'unset');
                div_loading_wallet_casembrapa.css('display', 'none');
                img_download_wallet_casembrapa.attr('href', href_img_download_wallet_casembrapa+data);
            });
        });
    } else {
        div_download_wallet_casembrapa.css('display', 'unset');
    }
    
    
    if (wallet_cassi.length > 0 && exists_wallet_img_cassi.length == 0) {
        html2canvas(wallet_cassi[0], {scale:1}).then(function(canvas) {
            var img = canvas.toDataURL('image/jpeg', 1);
            // document.body.appendChild(canvas);
            // console.log(img);
    
            var _token = form_cassi.find("input[name='_token']").val();
            var id_cassi_wallet = form_cassi.find("input[name='id_cassi_wallet']").val();
            $.post(form_cassi.attr('action'), {
                _token: _token,
                img: img,
                id_cassi_wallet: id_cassi_wallet,
            }, function(data) {
            }).done(function(data) {
                var href_img_download_wallet_cassi = img_download_wallet_cassi.attr('href');
                
                div_download_wallet_cassi.css('display', 'unset');
                div_loading_wallet_cassi.css('display', 'none');
                img_download_wallet_cassi.attr('href', href_img_download_wallet_cassi+data);
            });
        });
    } else {
        div_download_wallet_cassi.css('display', 'unset');
    }
});