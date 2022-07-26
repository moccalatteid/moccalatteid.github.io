function previewImg() {
    const gambar      = document.querySelector('#gambar');
    const gambarLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    gambarLabel.textContent = gambar.files[0].name;

    const fileGambar = new FileReader();
    fileGambar.readAsDataURL(gambar.files[0]);

    fileGambar.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

function previewFileKuisioner() {
    const fileKuisioner = document.querySelector('#filekuisioner');
    const fileLabel     = document.querySelector('.filekuisioner');

    fileLabel.textContent = fileKuisioner.files[0].name;

    const fileUpload = new FileReader();
    fileUpload.readAsDataURL(file.files[0]);
}

function previewFileSaran() {
    const fileSaran = document.querySelector('#filesaran');
    const fileLabel = document.querySelector('.filesaran');

    fileLabel.textContent = fileSaran.files[0].name;

    const fileUpload = new FileReader();
    fileUpload.readAsDataURL(file.files[0]);
}

function previewFileNilai() {
    const fileNilai = document.querySelector('#filenilai');
    const fileLabel = document.querySelector('.filenilai');

    fileLabel.textContent = fileNilai.files[0].name;

    const fileUpload = new FileReader();
    fileUpload.readAsDataURL(file.files[0]);
}

function previewFileLaporan() {
    const fileLaporan = document.querySelector('#filelaporan');
    const fileLabel     = document.querySelector('.filelaporan');

    fileLabel.textContent = fileLaporan.files[0].name;

    const fileUpload = new FileReader();
    fileUpload.readAsDataURL(file.files[0]);
}

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000);

var path = location.pathname.split('/')
var url  = location.origin + '/' + path[1] + '/' + path[2]
console.log(url)
$('ul.navbar-nav li.nav-item a.nav-link').each(function() {
    if($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().addClass('active')
    }
})

// var button = document.getElementById("btn-tambah");
// var total_bimbingan = 0;
// function add_bimbingan()
// {
//     if(total_bimbingan < 3)
//     {
//         total_bimbingan++;
//     }
//     if(total_bimbingan >= 3)
//     {
//         button.disabled = true;
//     }
// }

// function disabledButton() {
//     var x = document.getElementById("btn-tambah");
//     x.disabled = true;
// }

// modal confirm
// function submitDel(id) {
//     $('#del'+id).submit()
// }

