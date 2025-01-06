const dropdowns = document.querySelectorAll('.dropdown-menu')
const boxPerkenalan = document.querySelector('.box-perkenalan')
const boxProjek = document.querySelector('.box-projek')
const boxKontak = document.querySelector('.box-kontak')

dropdowns.forEach(dropdown => {
    const select = document.querySelector('.select')
    const caret = document.querySelector('.caret')
    const menu = document.querySelector('.menu')
    const options = document.querySelectorAll('.menu li')
    const selected = document.querySelector('.selected')
    
    select.addEventListener('click', () => {
        select.classList.toggle('select-clicked')
        caret.classList.toggle('caret-rotate')
        menu.classList.toggle('menu-open')
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.innerText = option.innerText
            select.classList.remove('select-clicked')
            caret.classList.remove('caret-rotate')
            menu.classList.remove('menu-open')
            options.forEach(option => {
                option.classList.remove('active')
            })
            option.classList.add('active')
            if (selected.innerText == "Projek") {
                boxPerkenalan.classList.remove('view-box')
                boxKontak.classList.remove('view-box')
                boxProjek.classList.add('view-box')
            }
            else if (selected.innerText == "Kontak") {
                boxPerkenalan.classList.remove('view-box')
                boxProjek.classList.remove('view-box')
                boxKontak.classList.add('view-box')
            }
            else if (selected.innerText == "Perkenalan") {
                boxProjek.classList.remove('view-box')
                boxKontak.classList.remove('view-box')
                boxPerkenalan.classList.add('view-box')
            }
        })
    })
});