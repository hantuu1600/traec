// Preloader
window.addEventListener('load', function () {
    const preloader = document.getElementById('preloader');
    if (!preloader) return;

    // Tambah durasi tampil (1000ms = 1 detik)
    setTimeout(() => {
        preloader.classList.add('opacity-0', 'pointer-events-none', 'transition', 'duration-300');

        setTimeout(() => {
            preloader.style.display = 'none';
        }, 300);

    }, 3000);
});
