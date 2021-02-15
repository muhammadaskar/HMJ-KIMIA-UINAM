const flashData = $('.flash-data').data('flashdata')
// const flashData = $('.flash-data-failed').data('flashdata')

if (flashData) {
    Swal.fire({
        title: 'Berhasil',
        text: flashData,
        type: 'success',
        icon: 'success'
    })
}
// else if (flashDataFailed) {
//     Swal.fire({
//         type: 'info',
//         title: 'Oops...',
//         text: flashDataFailed,
//     })
// }