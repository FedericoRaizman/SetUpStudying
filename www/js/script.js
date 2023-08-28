document.addEventListener("DOMContentLoaded", function () {
    const calendarContainer = document.getElementById("calendar");
    const eventForm = document.getElementById("eventForm");
  
    // Objeto para almacenar los eventos
    let events = [];
  
    // Función para agregar un evento al array de eventos
    function addEvent(eventName, eventDate) {
      events.push({ name: eventName, date: eventDate });
    }
});
 
  
  