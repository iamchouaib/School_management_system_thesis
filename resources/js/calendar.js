import {Calendar} from "@fullcalendar/core";
import interactionPlugin, {Draggable} from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import Swal from "sweetalert2";

(async function (qualifiedName, value) {


    if ($("#calendar").length || $("#calendar-admin").length || $("#calendar-teacher").length || $("#calendar-parent").length) {

        /* BEGIN : TEACHER CALENDAR */
        if ($("#calendar").length) {


            let url = window.location.pathname;
            var groupe_id = url.substring(url.lastIndexOf('/') + 1);
            const requestURL = 'http://127.0.0.1:8000/api/groupe/?groupe_id=' + groupe_id;
            const request = new Request(requestURL);
            const response = await fetch(request);
            const superHeroes = await response.json();

            let calendar = new Calendar($("#calendar")[0], {

                plugins: [
                    timeGridPlugin,
                    interactionPlugin,
                    dayGridPlugin,
                    listPlugin,
                ],
                droppable: true,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                initialDate: Date.now(),
                navLinks: false,
                editable: false,
                dayMaxEvents: true,
                hiddenDays: [5, 6],
                slotMinTime: "08:00:00",
                slotMaxTime: "18:00:00",

                slotLabelFormat: [
                    {hour: '2-digit', minute: '2-digit'}, // top level of text
                ],
                events:

                superHeroes

                ,


                dateClick: function (info) {

                    let d = new Date(info.dateStr).getDay();
                    let t = new Date(info.dateStr);


                    const myModal = tailwind.Modal.getInstance(document.querySelector("#schedule"));

                    myModal.show();

                    $("#day").val(d);
                    $("#time").val(t.getHours() + ':' + t.getMinutes());
                },

                eventClick: function (info) {
                    $('#calendar').Calendar({events: superHeroes,});

                    // change the border color just for fun
                    info.el.style.borderColor = '#000';
                },


                // select: function(info) {
                //     alert('selected ' + info.startStr + ' to ' + info.endStr + ' on resource ');
                // },

            });


            async function addSession() {
                // Reset state
                // $('#adSession').find('.login__input').removeClass('border-danger')
                // $('#adSession').find('.login__input-error').html('')

                //Post form
                let module = $('#moduleS').val()
                let teacher = $('#teacher').val()
                let session_type = $('#session_type').val()
                let sale_id = $('#sale').val()
                let day = $('#day').val()
                let duration = $('#time').val()

                // Loading state
                $('#addSession').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                tailwind.svgLoader()
                await helper.delay(1500)

                axios.post(window.location.href, {
                    module_id: module,
                    user_id: teacher,
                    session_type: session_type,
                    sale_id: sale_id,
                    day: day,
                    duration: duration,
                }).then(res => {
                    $('#addSession').html('Save')
                    const myModal = tailwind.Modal.getInstance(document.querySelector("#schedule"));
                    myModal.hide();

                    const myModalEl = document.getElementById('myModal')
                    // myModalEl.addEventListener('hidden.tw.modal', function(event) {
                    //     $('$adSession').ht
                    // })

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'added in successfully'
                    })

                    res.data.forEach(function (da) {
                        calendar.addEvent(da);
                    })

                }).catch(err => {
                    $('#addSession').html('send Again')
                    $('#moduleS').addClass('border-danger')
                    $('#tosave').html(err.response.data.message)
                        .addClass('text-xs text-danger')
                        .removeClass('font-medium text-base')

                    // if (err.response.data.message != 'Wrong email or password.') {
                    //     for (const [key, val] of Object.entries(err.response.data.errors)) {
                    //         $(`#${key}`).addClass('border-danger')
                    //         $(`#error-${key}`).html(val)
                    //     }
                    // } else {
                    //     $(`#moduleS`).addClass('border-danger')
                    //     $(`#error-password`).html(err.response.data.message)
                    // }
                })
            }

            $('#addSession').on('keyup', function (e) {
                if (e.keyCode === 13) {
                    addSession()
                }
            })

            $('#addSession').on('click', function () {
                addSession();
            })

            calendar.render();
        }
        /* END :TEACHER CALENDAR */


        /* BEGIN : ADMIN CALENDAR */
        if ($("#calendar-admin").length) {

            await doCalendar(null, 'admin', true, true, true);


            /*** IF CHANGE TEACHER  ***/
            document.querySelector('#choose_teacher').addEventListener('change', async function () {

                let choosen = $("#choose_teacher").val();
                let nameT = $('.item').text()
                let requestURL = 'http://127.0.0.1:8000/api/schedule/teacher/' + choosen;

                $('#title_c').html(`Calendar <span class="text-primary text-lg font-medium -intro-x" > ${nameT} </span>`);

                const request = new Request(requestURL);

                const response = await fetch(request);
                const events = await response.json();

                await doCalendar(events, 'admin' , true, true, true)

            });

            /*** If Not ***/

            $('#full_calendar').on('click', function () {
                doCalendar(null, 'admin', true, true, true)
            })


            //and big function

        }
        /* END :ADMIN CALENDAR */


        /* BEGIN : TEACHER CALENDAR */
        if ($("#calendar-teacher").length) {

            /*** BEGIN : Fetch  ***/
            let requestURL = 'http://127.0.0.1:8000/api/schedule/teacher/'+id;
            let request = new Request(requestURL);
            let response = await fetch(request);
            let events = await response.json();

            /*** END : Fetch  ***/

            await doCalendar(events, 'teacher');


            $('#choose_groupe').on('change', async function () {

                /*** ADD Fetch To Get DATA  ***/
                const reqURL = 'http://127.0.0.1:8000/api/groupe/?groupe_id=' + $('choose_groupe').val();
                const request = new Request(reqURL);
                const response = await fetch(request);
                const events = await response.json();
                /*** END Fetch To Get DATA  ***/

                await doCalendar(events, 'teacher')

            })
        }

        /* END :TEACHER CALENDAR */


        /* BEGIN : PARENT CALENDAR */
        if ($("#calendar-parent").length) {

            console.log(id)
            /*** BEGIN : Fetch  ***/
            let requestURL = 'http://127.0.0.1:8000/api/schedule/parent/'+id;
            let request = new Request(requestURL);
            let response = await fetch(request);
            let events = await response.json();

            /*** END : Fetch  ***/

            await doCalendar(events, 'parent');


            $('#choose-student').on('change', async function () {

                /*** ADD Fetch To Get DATA  ***/
                const reqURL = 'http://127.0.0.1:8000/api/schedule/parent/' + $('#choose-student').val();
                const request = new Request(reqURL);
                const response = await fetch(request);
                const events = await response.json();
                /*** END Fetch To Get DATA  ***/

                await doCalendar(events, 'parent')

            })

        }


        /* END :PARENT CALENDAR */



        /**
         * @param events
         * @param {string} role
         * @param edit
         * @param drop
         * @param select
         */
        async function doCalendar(events,  role, edit = false, drop = false, select = false)
        {
            if (events == null) {
                /*** ADD Fetch To Get DATA  ***/
                let teacher = document.querySelector('#choose_teacher');
                let requestURL = 'http://127.0.0.1:8000/api/events/';
                let request = new Request(requestURL);
                let response = await fetch(request);
                events = await response.json();
                /*** END Fetch To Get DATA  ***/
            }


            /*** CREATE CALENDAR  ***/
            let calendar = new Calendar($(`#calendar-${role}`)[0], {
                plugins: [
                    timeGridPlugin,
                    interactionPlugin,
                    dayGridPlugin,
                    listPlugin,
                ],

                droppable: drop,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                initialDate: Date.now(),
                navLinks: true,
                editable: edit,
                clickable: false,
                dayMaxEvents: true,
                selectable: select,
                hiddenDays: [5, 6],
                slotMinTime: "08:00:00",
                slotMaxTime: "18:00:00",
                allDaySlot: false,

                slotLabelFormat: [
                    {hour: '2-digit', minute: '2-digit'}, // top level of text
                ],
                events: events,


                dateClick: function (info) {

                },

                select: function (info) {


                    $('#find_parent').find('.border-remover').removeClass('border-danger')
                    $('#find_parent').find('.login__input-error').html('')


                    //show modal
                    const myModal = tailwind.Modal.getInstance(document.querySelector("#schedule_events"));
                    myModal.show();


                    $("#end_date").val(`${info.endStr}`);
                    //request

                    $('#save_event').on('click', async function () {


                        // Loading state
                        $('#save_event').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>')
                        tailwind.svgLoader()
                        await helper.delay(1500)

                        axios.post(`/api/events/save`, {

                            title: $('#title').val(),
                            start_date: info.startStr,
                            end_date: info.endStr,
                            roles: $('#roles').val(),
                            groupes: $('#groupes').val(),

                        }).then(res => {
                            $('#btn-save').html('Save')
                            const myModal = tailwind.Modal.getInstance(document.querySelector("#schedule_events"));
                            myModal.hide();

                            calendar.addEvent(res.data);


                            $('#save_event').html('Save')

                        }).catch(err => {

                            for (const [key, val] of Object.entries(err.response.data.errors)) {
                                $(`#${key}`).addClass('border-danger')
                                $(`#error-${key}`).html(val)
                            }

                            $('#save_event').html('save')

                        })

                    })


                },


                eventDrop: function (info) {

                    // alert(info.event.id + " was dropped on " + info.event.start.toISOString());

                    // if (!confirm("Are you sure about this change?")) {
                    //     info.revert();
                    // }


                    Swal.fire({
                        title: 'Do you want to save the changes?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                        denyButtonText: `Don't save`,
                    }).then((result) => {


                        if (result.isConfirmed) {

                            Swal.fire('Saved!', '', 'success')
                            axios.patch(`http://127.0.0.1:8000/api/schedule`, {
                                id: info.event.id,
                                seance_date: new Date(info.event.start).toISOString(),
                            }).then(res => {
                                calendar.render();
                            }).catch(err => {

                            })

                        } else {
                            info.revert();
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })


                },


                eventClick: function (info) {

                    if (edit && role == 'admin') {

                        Swal.fire({

                            showCancelButton: true,
                            confirmButtonText: 'Delete',
                            denyButtonText: `Cancel`,
                            icon: 'info',
                            title: 'Event Info',
                            text: info.event.title,
                        }).then(res => {
                            if (res.isConfirmed) {

                                axios.delete(`http://127.0.0.1:8000/api/event/${info.event.id}/delete`, {})
                                    .then(res => {


                                        info.event.remove()
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'bottom-end',
                                            showConfirmButton: false,

                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Deleted in successfully'
                                        })
                                    })
                                    .catch(err => {
                                    })

                            }
                        })

                    }

                    if ( role === 'teacher' || role === 'parent') {

                        window.location.replace("/show-seance/"+info.event.id);

                    }


                }


            });


            /*** CREATE CALENDAR  ***/
            calendar.render();


        }


    }

})();


