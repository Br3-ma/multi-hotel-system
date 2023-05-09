<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div id="external-events" class="my-3 px-3 row">
                    {{-- <div class="external-event btn-primary light" data-class="bg-danger"><i class="fa fa-move"></i><span>Booked</span></div>
                    <div class="external-event btn-warning light" data-class="bg-success"><i class="fa fa-move"></i>Available</div> --}}
                </div>
            </div>
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar" class="app-fullcalendar"></div>
                    </div>
                </div>
            </div>
            <!-- BEGIN MODAL -->
            <div class="modal fade none-border" id="event-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><strong>Add New Event</strong></h4>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event waves-effect waves-light">Create
                                event</button>

                            <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-bs-toggle="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Add Category -->
            {{-- removed --}}
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset('public/dash/vendor/fullcalendar/js/main.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var bookings = @json($events);
        console.log(bookings);

    
        
        /* initialize the external events
            -----------------------------------------------------------------*/

            // var containerEl = document.getElementById('external-events');
            // new FullCalendar.Draggable(containerEl, {
            // itemSelector: '.external-event',
            // eventData: function(eventEl) {
            //     return {
            //     title: eventEl.innerText.trim()
            //     }
            // }
            
            // });
            /* initialize the calendar
            -----------------------------------------------------------------*/

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            
            selectable: false,
            selectMirror: false,
            select: function(arg) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    })
                }
                calendar.unselect()
            },
            
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar
            drop: function(arg) {
                // is the "remove after drop" checkbox checked?
                if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                }
            },
            initialDate: '2023-04-13',
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                nowIndicator: true,
                events: bookings
                
            });     
            calendar.addEvent({
                bookings
            });

            calendar.render();
        
    
        
        
        
    // jQuery(window).on('load',function(){
    //     setTimeout(function(){
    //         fullCalender();	
    //     }, 1000);
        
    // });	
    });
</script>

{{-- <script src="{{ asset('public/dash/js/plugins-init/fullcalendar-init.js') }}"></script>  --}}
