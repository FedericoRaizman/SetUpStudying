document.addEventListener("DOMContentLoaded", function () {
    const calendarContainer = document.getElementById("calendar");
    const eventForm = document.getElementById("eventForm");
  
    // Objeto para almacenar los eventos
    let events = [];
  
    // Función para agregar un evento al arreglo de eventos
    function addEvent(eventName, eventDate) {
      events.push({ name: eventName, date: eventDate });
    }
  
    // Función para mostrar los eventos en el calendario
    function displayEvents() {
      calendarContainer.innerHTML = "";
  
      const currentDate = new Date();
      const currentYear = currentDate.getFullYear();
      const currentMonth = currentDate.getMonth();
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  
      for (let i = 1; i <= daysInMonth; i++) {
        const dayElement = document.createElement("div");
        dayElement.textContent = i;
        calendarContainer.appendChild(dayElement);
  
        const date = new Date(currentYear, currentMonth, i);
        const formattedDate = date.toISOString().split("T")[0];
  
        // Verificar si hay un evento en esta fecha
        const event = events.find((event) => event.date === formattedDate);
        if (event) {
          const eventElement = document.createElement("div");
          eventElement.textContent = event.name;
          eventElement.classList.add("event");
          dayElement.appendChild(eventElement);
        }
      }
    }
  
    // Manejador de eventos para el formulario de agregar evento
    eventForm.addEventListener("submit", function (event) {
      event.preventDefault();
      const eventName = document.getElementById("eventName").value;
      const eventDate = document.getElementById("eventDate").value;
  
      if (eventName && eventDate) {
        addEvent(eventName, eventDate);
        displayEvents();
        eventForm.reset();
      }
    });
  
    // Mostrar los eventos al cargar la página
    displayEvents();
  });
  