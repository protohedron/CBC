<link rel='stylesheet' href='fullcalendar-3.9.0\fullcalendar.css' />
<script src='fullcalendar-3.9.0\lib\jquery.min.js'></script>
<script src='fullcalendar-3.9.0\lib\moment.min.js'></script>
<script src='fullcalendar-3.9.0\fullcalendar.js'></script>

<script>
//script for full calendar backend

$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events:'uploadCalendar.php',
        selectable: true,
        selectHelper: true,
        eventLimit: true,
        navLinks: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        //fetch all events and display in calendar
        select: function(start, end){
            var title = prompt("Enter Event Title");
            if(title){
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url:"insertEvents.php",
                    type:"POST",
                    data:{title:title, start:start, end:end},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                    }
                })
            }
        },   

        //change event times
        eventResize: function(event){
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"updateEvents.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                }
            })
        },

        //delete event
        eventDrop:function(event){
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"updateEvents.php",
                type:"POST",
                data:{title:title, start:start, end:end, id:id},
                success:function(){
                    calendar.fullCalendar('refetchEvents');
                }
            });
        },
        
        //confirm before delete event
        eventClick:function(event){
            if(confirm("Are you sure you want to delete this event?")){
                var id = event.id;
                $.ajax({
                    url:"deleteEvent.php",
                    type:"POST",
                    data:{id:id},
                    success:function(){
                        calendar.fullCalendar('refetchEvents');
                    }
                })
            }
        },
    });
});
</script>

<!--calendar here-->
<div id='calendar'></div>

