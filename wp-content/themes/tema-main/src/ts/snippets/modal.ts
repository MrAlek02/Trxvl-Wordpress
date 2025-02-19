const modal = () => {
    const buttons = document.querySelectorAll('.js-button');
    const modals = document.querySelectorAll('.js-modal');

    buttons.forEach((btn, index) => {
        btn.addEventListener('click', ()=> {
            modals[index].classList.add('active')
        })
    })

    const closeModal = (modal) => {
        modal.classList.remove('active')
    }

    modals.forEach(modal => {
        const modalBackground = modal.querySelector('.js-modal-bg');
        const modalClose = modal.querySelector('.js-modal-close');
        const modalButton = modal.querySelector('.js-modal-button');

        modalBackground.addEventListener('click', () => closeModal(modal))
        modalClose.addEventListener('click', () => closeModal(modal))
        modalButton.addEventListener('click', () => closeModal(modal))
    })
}

export default modal;