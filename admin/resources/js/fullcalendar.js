import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import ptbrLocale from '@fullcalendar/core/locales/pt-br';
import timeGridPlugin from '@fullcalendar/timegrid';


if ($('#calendar').length > 0) {
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendar');

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
            }],
        });

        calendar.render();
    });
}

if ($('#calendarDoctor').length > 0) {
    document.addEventListener('DOMContentLoaded', function () {
        let calendarEl = document.getElementById('calendarDoctor');
        let scrollTime = moment().format("HH") + ":00:00";

        let calendar = new Calendar(calendarEl, {
            plugins: [timeGridPlugin],
            initialView: 'timeGridFourDay',
            locale: ptbrLocale,
            nowIndicator: true,
            now: new Date(),
            scrollTime: scrollTime,
            allDaySlot: false,
            contentHeight: 600,
            titleFormat: {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            },
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'timeGridDay,timeGridFourDay'
            },
            views: {
                timeGridFourDay: {
                    type: 'timeGrid',
                    duration: { days: 4 },
                    buttonText: '4 dias'
                }
            },
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false,
                duration: { days: 4 },
            },
            eventSources: [{
                url: '/attendances-perdate',
                color: '#3490dc',
                textColor: '#fff',
                timeZoneParam: 'America/Sao_Paulo'
            }],
        });

        calendar.render();
    });
}
