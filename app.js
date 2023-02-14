const formulario = document.querySelector('#formulario');

formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    enviacorreo();
})

function enviacorreo() {
    const datos = new FormData(formulario);
    fetch('send-mail.php', {
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(res => {
            console.log(res);

            if ('exito') {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        })
}