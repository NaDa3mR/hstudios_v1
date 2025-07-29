@if (session('success'))
<script>
    let timerInterval
    Swal.fire({
        title: "{{ session('success') }}",
        timer: 2000,
        timerProgressBar: true,
        icon: 'success',
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },
        onClose: () => { clearInterval(timerInterval) }
    })
</script>
@endif
@if (session('error'))
<script>
    let timerInterval
    Swal.fire({
        title: "{{ session('error') }}",
        timer: 2000,
        timerProgressBar: true,
        icon: 'error',
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },
        onClose: () => { clearInterval(timerInterval) }
    })
</script>
@endif
