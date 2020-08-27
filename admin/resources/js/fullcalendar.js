import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import ptbrLocale from '@fullcalendar/core/locales/pt-br';

if ($('#calendar').length > 0) {
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin],
            initialView: 'dayGridWeek',
            locale: ptbrLocale,
            eventTimeFormat: { 
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventSources: [{
                url: '/attendances-perdate',
                color: '#3490dc',  
                textColor: '#3490dc', 
                timeZoneParam: 'America/Sao_Paulo'
            }]
        }); 

        calendar.render();
    });
}