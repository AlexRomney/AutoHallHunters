@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1> Edit Appointment </h1>
                <hr />
            </div>
        </div>

        <div class='col-md-12'>
            <form method='POST' action='/appointment/{{ $edit->id }}'>
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name='name' value="{{ $edit->name }}" class="form-control" id="name" required>
                </div>

                 <div class="form-group">
                    <label for="physician">Physician</label>
                    <select class="form-control" id="physician" name='physician' >
                        <option value="{{ $edit->physician }}"> {{ $edit->physician }} </option>
                        <option value="Dr. Tyler"> Dr. Tyler </option>
                        <option value="Dr. Tim"> Dr. Tim </option>
                    </select>
                </div>

                <div class='form-group'>
                    <label for="appointment_date">Appointment Date</label>
                    <div class="input-container">
                        <input class="form-control" id="appointment_date" data-appointment_date="{{ date('m/d/Y', strtotime($edit->appointment_date)) }}" class="form-input" name="appointment_date" />
                    </div>
                </div>

                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-12'>
                            <label for="appointment_time">Appointment Time</label>
                            <input type="text" name='appointment_time' value="{{ $edit->appointment_time }}" class="form-control" id="appointment_time" placeholder='1:00' required>
                        </div>
                   </div>
               </div>

                <button type='submit' class='btn btn-primary'> Submit </button>
                <a href='/home' class='btn btn-danger'> Cancel </a>
            </form>
        </div>
    </div>
@endsection

@section('custom_scripts')
    <script type="text/javascript">
        $(function() {
            var appointmentDate = $('#appointment_date').data('appointment_date');
            var auto = appointmentDate !== "01/01/1970" ? true : false;

            $('input[name="appointment_date"]').daterangepicker({
                autoUpdateInput: auto,
                locale: {
                    cancelLabel: 'Clear'
                },
                startDate: appointmentDate === "01/01/1970" ? moment().startOf('hour') : appointmentDate,
                singleDatePicker: true,
                showDropdowns: true,
            });

            $('input[name="appointment_date"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
        });
    </script>

@endsection
