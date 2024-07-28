import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import axios from 'axios';

document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');

  if (!calendarEl) {
    return;
  }

  const events = JSON.parse(calendarEl.dataset.events);

  const calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
    local: 'ja',
    height: 'auto',
    headerToolbar: {
      left: 'prev',
      center: 'title',
      right: 'next dayGridMonth,timeGridWeek,timeGridDay'
    },
    initialDate: '2024-07-27',
    navLinks: true,
    editable: true,
    dayMaxEvents: true,
    events: events.map(event => ({
      id: event.id,
      title: event.title,
      start: `${event.date}T${event.start_time}`,
      end: `${event.date}T${event.end_time}`,
      description: event.contents,
      color: 'yellowgreen'
    })),
    buttonText: {
      today: '今月',
      month: '月',
      week: '週',
      day: '日',
      list: 'リスト'
    },
    dateClick: function(info) {
      // クリックした日付を取得
      const selectedDate = info.dateStr;

      // フォームをリセット
      resetForm();

      // フォームを表示
      const eventModal = document.getElementById('eventModal');
      eventModal.style.display = 'block';

      // フォームの送信ハンドラを設定
      const eventForm = document.getElementById('eventForm');
      eventForm.onsubmit = function(event) {
        event.preventDefault();

        // フォームからデータを取得
        const id = document.getElementById('eventId').value;
        const title = document.getElementById('eventTitle').value;
        const contents = document.getElementById('eventContents').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;

        if (id) {
          // 更新
          axios.put(`/events/${id}`, {
            title: title,
            contents: contents,
            date: selectedDate,
            start_time: startTime,
            end_time: endTime
          })
          .then(response => {
            const event = response.data;
            const calendarEvent = calendar.getEventById(event.id);
            calendarEvent.setProp('title', event.title);
            calendarEvent.setStart(`${event.date}T${event.start_time}`);
            calendarEvent.setEnd(`${event.date}T${event.end_time}`);
            calendarEvent.setExtendedProp('description', event.contents);

            eventForm.reset();
            eventModal.style.display = 'none';
          })
          .catch(error => {
            console.error('Error updating event:', error);
          });
        } else {
          // 追加
          axios.post('/events', {
            title: title,
            contents: contents,
            date: selectedDate,
            start_time: startTime,
            end_time: endTime
          })
          .then(response => {
            const event = response.data;
            calendar.addEvent({
              id: event.id,
              title: event.title,
              start: `${event.date}T${event.start_time}`,
              end: `${event.date}T${event.end_time}`,
              description: event.contents,
              color: 'yellowgreen'
            });

            eventForm.reset();
            eventModal.style.display = 'none';
          })
          .catch(error => {
            console.error('Error adding event:', error);
          });
        }
      };

      document.getElementById('deleteButton').style.display = 'none';
    },
    eventClick: function(info) {
      const event = info.event;

      // イベントデータをフォームに入力
      document.getElementById('eventId').value = event.id;
      document.getElementById('eventTitle').value = event.title;
      document.getElementById('eventContents').value = event.extendedProps.description;
      document.getElementById('startTime').value = event.start.toISOString().substring(11, 16);
      document.getElementById('endTime').value = event.end.toISOString().substring(11, 16);

      // フォームを表示
      const eventModal = document.getElementById('eventModal');
      eventModal.style.display = 'block';

      // フォームの送信ハンドラを設定
      const eventForm = document.getElementById('eventForm');
      eventForm.onsubmit = function(eventSubmit) {
        eventSubmit.preventDefault();

        // フォームからデータを取得
        const id = document.getElementById('eventId').value;
        const title = document.getElementById('eventTitle').value;
        const contents = document.getElementById('eventContents').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;

        // 更新
        axios.put(`/events/${id}`, {
          title: title,
          contents: contents,
          date: event.start.toISOString().substring(0, 10),
          start_time: startTime,
          end_time: endTime
        })
        .then(response => {
          const updatedEvent = response.data;
          event.setProp('title', updatedEvent.title);
          event.setStart(`${updatedEvent.date}T${updatedEvent.start_time}`);
          event.setEnd(`${updatedEvent.date}T${updatedEvent.end_time}`);
          event.setExtendedProp('description', updatedEvent.contents);

          eventForm.reset();
          eventModal.style.display = 'none';
        })
        .catch(error => {
          console.error('Error updating event:', error);
        });
      };

      document.getElementById('deleteButton').style.display = 'block';
      document.getElementById('deleteButton').onclick = function() {
        const id = document.getElementById('eventId').value;

        // 削除
        axios.delete(`/events/${id}`)
        .then(() => {
          event.remove();

          eventForm.reset();
          eventModal.style.display = 'none';
        })
        .catch(error => {
          console.error('Error deleting event:', error);
        });
      };
    }
  });

  calendar.render();

  function validateTimeInput(input) {
    input.addEventListener('change', function() {
      const [hours, minutes] = this.value.split(':');
      if (minutes % 15 !== 0) {
        const roundedMinutes = Math.round(minutes / 15) * 15;
        this.value = `${hours.padStart(2, '0')}:${roundedMinutes.toString().padStart(2, '0')}`;
      }
    });
  }

  validateTimeInput(document.getElementById('startTime'));
  validateTimeInput(document.getElementById('endTime'));

  function resetForm() {
    const eventForm = document.getElementById('eventForm');
    eventForm.reset();
    document.getElementById('eventId').value = '';
    document.getElementById('deleteButton').style.display = 'none';
  }
});
