@extends('admin-panel.layout.main')
@section('main.content')

<!-- content -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Update Schedule Appointment Timing</h3>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="appoint-day">Select Appointment Duration</label>
                                    <select class="form-select form-select-lg" id="appoint-day" name="duration">
                                        <option selected disabled>Timing Slot Duration</option>
                                        <option value="10" @if($dayTime->duration == '10') selected @endif>10</option>
                                        <option value="15" @if($dayTime->duration == '15') selected @endif>15</option>
                                        <option value="20" @if($dayTime->duration == '20') selected @endif>20</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mt-5">
                                    {{-- <button>update</button> --}}
                                    <a href="#" class="rounded mx-2 mb-2 accept-link updateDuration" data-day-time="{{$dayTime->id}}" style="padding: 5px 10px; background: #E2F6ED; text-decoration: none; color: #2CAF48;">
                                        <i class="fas fa-check"></i> Update
                                    </a>
                                </div>
                            </div>
                            @foreach ($availableDays as $items)
                                <div class="row mt-3 ms-1">
                                    <div class="col-md-3">
                                        <label for="appoint-day">Select Available Day</label>
                                        <select class="form-select form-select-lg" id="appoint-day" name="day[]">
                                            <option disabled>Select days</option>
                                            <option value="Monday" @if($items->day == 'Monday') selected @endif>Monday</option>
                                            <option value="Tuesday" @if($items->day == 'Tuesday') selected @endif>Tuesday</option>
                                            <option value="Wednesday" @if($items->day == 'Wednesday') selected @endif>Wednesday</option>
                                            <option value="Thursday" @if($items->day == 'Thursday') selected @endif>Thursday</option>
                                            <option value="Friday" @if($items->day == 'Friday') selected @endif>Friday</option>
                                            <option value="Saturday" @if($items->day == 'Saturday') selected @endif>Saturday</option>
                                            <option value="Sunday" @if($items->day == 'Sunday') selected @endif>Sunday</option>
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
                                        <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{ old('start_time', $items->start_time) }}"
                                        required>
                                        @error('start_time')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end-time">Select End Time:</label>
                                        <input class="form-control form-control-solid @error('end_time') is-invalid @enderror" type="time" id="end_time" name="end_time[]" value="{{ old('end_time', $items->end_time) }}" required>
                                        @error('end_time')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        {{-- <button type="button" class="btn btn-primary mt-4 btn-add">Add</button> --}}
                                        <div class="mt-4">
                                            <a href="#" class="rounded mx-2 mb-2 accept-link updateDayTime" data-day-time="{{$items->id}}" style="padding: 5px 10px; background: #E2F6ED; text-decoration: none; color: #2CAF48;">
                                            <i class="fas fa-check"></i> Update
                                            </a>
                                            
                                            <a href="#" class="rounded mb-2 deleteDayTime" data-day-time="{{$items->id}}" style="padding:5px 10px; background:#FDE2E7;text-decoration:none; color:#E63C3C">
                                                <i class="fas fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <form action="{{route('store.schedule-timing')}}" method="POST">
                                @csrf
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

                            <button type="submit" class="btn btn-primary mt-4 ms-3">Update Schedule Timing</button>
                            </form> --}}
                        </div>
                    </div>
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
        $(document).ready(function(){
            $('.btn-add').on('click', function(){
                var $template = $('.repeater').clone();
                $template.removeClass('repeater');
                $template.addClass('repeater-item');
                $template.find('.btn-add').remove();
                $template.append('<div class="col-md-3 mt-2"><button type="button" class="btn btn-danger btn-remove">Remove</button></div>');

                $('.repeater-items').append($template);
            });
    
            $(document).on('click', '.btn-remove', function(){
                $(this).closest('.repeater-item').remove();
            });
        });
    </script>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //code for update appointment schedule
        $('.updateDayTime').click(function(e){
            e.preventDefault();

            var dayTime_id = $(this).data('day-time');
            var day = $(this).closest('.row').find('select[name="day[]"]').val();
            var start_time = $(this).closest('.row').find('input[name="start_time[]"]').val();
            var end_time = $(this).closest('.row').find('input[name="end_time[]"]').val();
            
            $.ajax({
                url: '{{ route('update.schedule-timing') }}',
                method: 'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id: dayTime_id,
                    day: day,
                    start_time: start_time,
                    end_time: end_time
                },
                success: function(response){
                    console.log(response);
                    toastr.success('Appointment Schedule Update Successfully!', 'Success');
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    toastr.error('An error occurred while updating the schedule.', 'Error');
                }
            });
        });

        //code for delete appointment schedule
        $('.deleteDayTime').click(function(){
            var dayTime_id = $(this).data('day-time');
            
            $.ajax({
                url: '{{ route('delete.schedule-timing') }}',
                method: 'Delete',
                data:{
                    _token: '{{ csrf_token() }}',
                    id: dayTime_id,
                },
                success: function(response){
                    location.reload();
                    console.log(response);
                    toastr.success('Appointment Schedule Delete Successfully!', 'Success');

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    toastr.error('An error occurred while deleting the schedule.', 'Error');
                }
                
            });
        });

        //code for update appointment duration schedule
        $('.updateDuration').click(function(){
            var dayTime_id = $(this).data('day-time');
            var duration = $(this).closest('.row').find('select[name="duration"]').val();
            $.ajax({
                url: '{{ route('update.schedule-duration') }}',
                method: 'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    id: dayTime_id,
                    duration: duration
                },
                success: function(response){
                    console.log(response);
                    toastr.success('Appointment Schedule Duration Update Successfully!', 'Success');

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    toastr.error('An error occurred while updating the duration.', 'Error');
                }
                
            });
        });
    });
</script>



