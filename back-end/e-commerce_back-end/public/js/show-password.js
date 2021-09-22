const buttons = document.querySelectorAll('.show-password button')

for ( let index = 0; index < buttons.length; index += 1 ){
    buttons[index].addEventListener('click', () => {
        let i = document.createElement('i')
        i.setAttribute('class', 'fas fa-eye')
        
        let button = document.createElement('button')
        button.setAttribute('type', 'button')
        button.appendChild(i)
    
        //let oldButton = buttons[index].parentElement.querySelector('button')
        let input = buttons[index].parentElement.querySelector('input')

        input.type = 'text'
        buttons[index].parentElement.querySelector('button').replaceWith(button)

        button.addEventListener('click', () => {
            input.type = 'password'
            button.parentElement.querySelector('button').replaceWith(buttons[index])
        })
    })
}