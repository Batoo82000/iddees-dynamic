const btn = document.querySelector('.btn_arrow_to_top')

btn.addEventListener('click', () => {
    window.scrollTo(
        {
            top:0,
            left:0,
            behavior:'smooth'
        }
    )
})