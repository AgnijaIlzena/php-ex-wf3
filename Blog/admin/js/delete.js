// DELETE MODAL

// console.log('Hello');
// btnDelete = document.querySelectorAll('.btnDelete');

// btnDelete.forEach(btn => {

//     btn.addEventListener('click', (event) => {
//         event.preventDefault();
//         const modal = new bootstrap.Modal(document.querySelector('#confirmDelete'));
//         modal.show();

//     })

// });



btnDelete = document.querySelectorAll('.btnDelete');


    btnDelete.addEventListener('click', (event) => {
        event.preventDefault();
        // recuperer attribute a href

        const href = btn.href;
        const modalDelete =document.querySelector('.btnDeleteModal');
        modalDelete.href=href;

        const modal = new bootstrap.Modal(document.querySelector('#confirmDelete'));
        modal.show();

    })










