@extends('admin-panel.layout.main')
@section('main.content')

<!-- content -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Create Schedule Appointment Timing</h3>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-4">
                    <form action="{{route('store.schedule-timing')}}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-3">
                                    <label for="appoint-day">Select Available Day</label>
                                    <select class="form-select form-select-lg" id="appoint-day" name="duration">
                                        <option selected disabled>Timing Slot Duration</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="row mt-3 repeater ms-1">
                                    <div class="col-md-3">
                                        <label for="appoint-day">Select Available Day</label>
                                        <select class="form-select form-select-lg" id="appoint-day" name="day[]">
                                            <option selected disabled>Select days</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                        @error('day')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="start-time">Select Start Time:</label>
                                        <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{ old('start_time') }}" required>
                                        @error('start_time')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end-time">Select End Time:</label>
                                        <input class="form-control form-control-solid @error('end_time') is-invalid @enderror" type="time" id="end_time" name="end_time[]" value="{{ old('end_time') }}" required>
                                        @error('end_time')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <button type="button" class="btn btn-primary mt-4 btn-add">Add</button>
                                    </div>
                                </div>

                                <div class="repeater-items">
                                    <!-- This is where the duplicated items will be appended -->
                                </div>

                                <button type="submit" class="btn btn-primary mt-4 ms-3">Create Schedule Timing</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- partial:partials/_footer.html -->
    @include('admin-panel.layout.footer')
    <!-- partial -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script>
    $(document).ready(function() {
        $('.btn-add').on('click', function() {
            var $template = $('.repeater').clone();
            $template.removeClass('repeater');
            $template.addClass('repeater-item');
            $template.find('.btn-add').remove();
            $template.append('<div class="col-md-3 mt-2"><button type="button" class="btn btn-danger btn-remove">Remove</button></div>');

            $('.repeater-items').append($template);
        });

        $(document).on('click', '.btn-remove', function() {
            $(this).closest('.repeater-item').remove();
        });
    });

</script>


@endsection
