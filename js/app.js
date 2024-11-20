"use strict"

const BASE_URL = "api/"; // url relativa a donde estoy parado (http://localhost/web2-tpe3/api)

// arreglo de eventos
let events = [];

// event listener para insertar evento
let form = document.querySelector("#event-form");
form.addEventListener('submit', insertEvent);


async function getAll() {
    try {
        const response = await fetch(BASE_URL + "tareas");
        if (!response.ok) {
            throw new Error('Error al llamar las tareas');
        }

        tasks = await response.json();
        showEvents();
    } catch(error) {
        console.log(error)
    }
}

async function insertEvent(e) {
    e.preventDefault();

    let data = new FormData(form);
    let event = {
        nombre: data.get('titulo'),
        descripcion: data.get('descripcion'),
        fecha: data.get('fecha'),
        tipo: data.get('tipo'),
    };

    try {
        let response = await fetch(BASE_URL + "eventos", {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(event)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nEvent = await response.json();

        // inserto el evento nuevo
        events.push(nEvent);
        showEvents();

        form.reset();
    } catch(e) {
        console.log(e);
    }
}

async function deleteEvent(e) {
    e.preventDefault();

    try {
        let id = e.target.dataset.task;
        let response = await fetch(BASE_URL + 'eventos/' + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        // eliminar el evento del arreglo global
        events = events.filter(event => event.id != id);
        showEvents();
    } catch(e) {
        console.log(e);
    }
}


/**
 * Renderiza los Eventos
 */
function showEvents() {
    let ul = document.querySelector("#task-list");
    ul.innerHTML = "";
    for (const event of events) {
        let html = `
            <li>
                <span> <b>${event.nombre}</b> - ${event.descripcion} (date ${event.date}) </span>
                <div class="ml-auto">
                    <a href='#' data-event="${event.id}" type='button' class='btn btn-small btn-danger btn-delete'>Borrar</a>
                </div>
            </li>
        `;

        ul.innerHTML += html;
    }


    let count = document.querySelector("#count");
    count.innerHTML = events.length;


    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deleteEvent);
    }

}


getAll();