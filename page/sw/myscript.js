$(function(){
    
    var formArea = $('#form-area'),
        dataArea = $('#data-area'),
        resultArea = $('#result'),
        loaderArea = $('#loader');
    
    // Load Data
    $.get('action.php?a=data', function(res){
        dataArea.html(res.html);
    }, 'json');
    
    $('#tabel-data').on('click', '.ubah', function(e){ // Klik tombol "ubah"
        e.preventDefault();
        var tr = $(this).closest('tr');
        var id = tr.attr('data-id');
        formArea.find('form').attr('action', 'action.php?a=ubah&id=' + id);
        formArea.find('h3').text('Edit Data Mahasiswa');
        // addClass('aktif') -> menandai baris yg sementara di ubah 
        tr.addClass('aktif').find('td[data-name]').each(function(){
            var fieldId = '#' + $(this).attr('data-name');
            var val = $(this).text();
            formArea.find(fieldId).val(val);
        });       
        formArea.find(':submit').text('Update Data'); 
    }).on('click', '.hapus', function(e){ // Klik tombol hapus
        e.preventDefault();
        var tr = $(this).closest('tr');
        var url = $(this).attr('href');
        if ( confirm('Yakin akan menghapus data ini?') ) {            
            $.get(url, function(res){
                // Tampilkan pesan selama 3 detik
                resultArea.removeClass().addClass(res.result).text(res.msg).slideDown(100).delay(3000).slideUp(100);
                if (res.result == 'ok') {
                    // tambahkan animasi blink pada baris yang akan dihapus
                    blink_baris_tabel(tr, '#F4ADAD');
                    tr.fadeOut(200, function(){
                       $(this).remove(); 
                       urutkan_nomor();
                    });
                    // reset form, mungkin sementara menginput/ubah. Kita panggil event onclick tombol reset
                    formArea.find(':reset').trigger('click');  
                }    
            }, 'json');
        }
    });
    
    $('#form-input').on('click', ':reset', function(e){ // Klik tombol reset
        dataArea.find('tr').removeClass('aktif');
        formArea.find('form').attr('action', 'action.php?a=input');
        formArea.find('h3').text('Input Data Mahasiswa');
        formArea.find(':submit').text('Tambahkan Data');
        formArea.find('input:first').focus();
    }).on('submit', function(e){ // Klik tombol submit
        e.preventDefault();
        var form = $(this);
        var post_data = $(this).serialize();
        var form_action = $(this).attr('action');
        // Disable semua inputan di form saat proses pengiriman
        form.find('input, select').prop('disabled', true);
        // Tampilkan animasi loading
        loaderArea.show();
        $.post(form_action, post_data, function(res){
            // enable kembali semua inputan saat respon dari server diterima
            form.find('input, select').prop('disabled', false);
            // sembunyikan kembali animasi loading
            loaderArea.hide();
            // Tampilkan pesan dari server selama 3 detik
            resultArea.removeClass().addClass(res.result).text(res.msg).slideDown(100).delay(3000).slideUp(100);
            if (res.result == 'ok') {
                var tr;
                if (res.action == 'input') { // Jika aksi = input
                    dataArea.prepend(res.html);  // Tambahkan data pada baris pertama
                    tr = dataArea.find('tr:first');
                } else { // Jika aksi = ubah
                    // Ubah baris data yang telah di-update
                    dataArea.find('tr[data-id=' + res.id + ']').after(res.html).remove();
                    tr = dataArea.find('tr[data-id=' + res.id + ']');
                }
                // urutkan kembali kolom nomor
                urutkan_nomor();
                // tambahkan animasi blink pada baris yang baru ditambahkan/diubah
                blink_baris_tabel(tr, '#FFCC99');
                // reset form
                form.find(':reset').trigger('click');   
            }             
        }, 'json');
    });
    
    function urutkan_nomor() {
        dataArea.find('tr').each(function(idx, tr){
            var no = idx + 1;
            $(this).find('td.nomor').text(no)
        });
    }
    
    function blink_baris_tabel(tr, blinkColor) {
        var warnaAsli = tr.css('background-color');
        tr.css('background-color', blinkColor);
        tr.animate({
            opacity: 0.4
            }, 'slow', function(){
                $(this).css({
                 'background-color': warnaAsli,
                 'opacity': 1
            });
        });
    }
    
});