// script.js
const btn = document.querySelector('#menu-btn');
const menu = document.querySelector('#sidemenu');
btn.addEventListener('click', e => {
    menu.classList.toggle("menu-expanded");
    menu.classList.toggle("menu-collapsed");

    document.querySelector('body').classList.toggle('body-expanded');
});

// Mostrar contenido al cargar la página
document.addEventListener("DOMContentLoaded", function () {
    // Recuperar el estado del menú desde localStorage
    const selectedContent = localStorage.getItem("selectedContent");

    // Mostrar el contenido seleccionado si está definido
    if (selectedContent) {
        showContent(selectedContent);
    } else {
        // Si no hay un contenido seleccionado en localStorage, muestra un contenido predeterminado aquí
        // showContent("noticias"); // Puedes seleccionar un contenido predeterminado
    }

    // Agregar un evento de clic a los enlaces de menú
    const menuLinks = document.querySelectorAll(".menu-link");
    menuLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const target = this.getAttribute("data-target");

            // Guardar el estado del menú en localStorage
            localStorage.setItem("selectedContent", target);

            // Mostrar el contenido seleccionado
            showContent(target);
        });
    });

    function showContent(contentId) {
        // Ocultar todos los contenidos
        const contents = document.querySelectorAll(".content");
        contents.forEach(function (content) {
            content.style.display = "none";
        });

        // Mostrar el contenido seleccionado
        const selectedContent = document.getElementById(contentId);
        if (selectedContent) {
            selectedContent.style.display = "block";
        }
    }
});

function eliminarNoti(id) {
    Swal.fire({
        title: '¿Quieres elimarlo?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            window.location.href = '../controller/c_eliminar_noti.php?id=' + id;
            
        }
        })
            }
function eliminarNoti(id) {
    Swal.fire({
        title: '¿Quieres elimarlo?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            window.location.href = '../controller/c_eliminar_noti.php?id=' + id;
            
        }
        })
            }

function eliminarAdmin(id) {
    Swal.fire({
        title: '¿Quieres elimarlo?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            window.location.href = '../controller/c_eliminar_admin.php?id=' + id;
            
        }
        })
            }

function eliminarAct(id) {
    Swal.fire({
        title: '¿Quieres elimarlo?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            window.location.href = '../controller/c_eliminar_act.php?id=' + id;
            
        }
        })
            }