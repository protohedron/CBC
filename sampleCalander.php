<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
<script src='fullcalander/lib/jquery.min.js'></script>
<script src='fullcalander/lib/moment.min.js'></script>
<script src='fullcalendar/fullcalendar.js'></script>

            <script>

                $(document).ready(function() {

                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        selectHelper: true,
                        editable: false,
                        eventLimit: true,
                        navLinks: true,

                        events: 'events.json'

                    });

                    $(".date").datetimepicker({

                        format:"YYYY-MM-DD HH:mm:ss"

                    });


                });

            </script>

            <div id='calendar'></div>
