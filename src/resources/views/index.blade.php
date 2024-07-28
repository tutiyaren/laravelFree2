<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar（FullCalendar）</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

<body>

    <div id='calendar' class="calendar" data-events='@json($events)'></div>

    <div id="eventModal" style="display:none;">
        <form id="eventForm">
            <input type="hidden" id="eventId" name="id">
            <label for="eventTitle">タイトル:</label>
            <input type="text" id="eventTitle" name="title" required>
            <label for="eventContents">内容:</label>
            <textarea id="eventContents" name="contents" required></textarea>
            <label for="startTime">開始時間:</label>
            <input type="time" id="startTime" name="start_time" step="900" required>
            <label for="endTime">終了時間:</label>
            <input type="time" id="endTime" name="end_time" step="900" required>
            <button type="submit">更新</button>
            <button type="button" id="deleteButton">削除</button>
        </form>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>