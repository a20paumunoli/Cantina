
    if (document.cookie.split(';').some((item) => item.trim().startsWith('comanda='))) {
    Swal.fire({
        position: 'center-center',
        icon: 'warning',
        title: 'Avui ja has fet una comanda...',
        showConfirmButton: false,
        timer: 2500
    });
}
