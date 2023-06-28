const onBack = () => {
    window.location.href =
        `/Project_WebBanHang/Template-Views/Admin/Product/Index.php`
}

function openFullscreen(image) {
    var fullscreenOverlay = document.getElementById('fullscreen-overlay');
    var fullscreenImage = document.getElementById('fullscreen-image');

    fullscreenImage.src = image.src;
    fullscreenOverlay.style.display = 'flex';
}

function closeFullscreen() {
    var fullscreenOverlay = document.getElementById('fullscreen-overlay');

    fullscreenOverlay.style.display = 'none';
}