@foreach (@$data['user']->doctor->dayTime as $appointmentSchedule)
<div class="row">
    <div class="col-sm-12 col-lg-12 mb-4">
        <form action="" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="col-md-3">
                        <label for="appoint-day">Timing Slot Duration</label>
                        <select class="form-select form-select-lg" id="appoint-day" name="duration">
                            <option selected disabled>Select Duration</option>
                            <option value="10" {{ @$appointmentSchedule->duration === '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ @$appointmentSchedule->duration === '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ @$appointmentSchedule->duration === '20' ? 'selected' : '' }}>20</option>
                        </select>
                    </div>
                    <div class="row mt-3 repeater ms-1">
                        <div class="col-md-4">
                            <label for="appoint-day">Available Day</label>
                            <select class="form-select form-select-lg" id="appoint-day" name="day[]">
                                <option selected disabled>Select days</option>
                                <option value="Monday" {{ @$appointmentSchedule->day === 'Monday' ? 'selected' : '' }}>Monday</option>
                                <option value="Tuesday" {{ @$appointmentSchedule->day === 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="Wednesday" {{ @$appointmentSchedule->day === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="Thursday" {{ @$appointmentSchedule->day === 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="Friday" {{ @$appointmentSchedule->day === 'Friday' ? 'selected' : '' }}>Friday</option>
                                <option value="Saturday" {{ @$appointmentSchedule->day === 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="Sunday" {{ @$appointmentSchedule->day === 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                            @error('day')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="start-time">Start Time:</label>
                            <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{old('end_time', @$appointmentSchedule->start_time) }}" required>
                            @error('start_time')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="end-time">End Time:</label>
                            <input class="form-control form-control-solid @error('end_time') is-invalid @enderror" type="time" id="end_time" name="end_time[]" value="{{ old('end_time', @$appointmentSchedule->end_time) }}" required>
                            @error('end_time')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2 d-flex">
                            <button type="button" class="btn btn-primary mt-4 me-2" data-schedule-DayTime={{$appointmentSchedule->id}}>Update</button>
                            {{-- <a href="{{route('schedule-timing.destroy',$appointmentSchedule->id )}}" class="btn btn-danger mt-4">Remove</a> --}}
                            <form method="POST" action="{{ route('schedule-timing.destroy', $appointmentSchedule->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger mt-4" onclick="return confirm('Are you sure you want to delete this schedule timing?')">Remove</button>
                            </form>

                            {{-- <button type="button" class="btn btn-danger mt-4" data-schedule-DayTime={{$appointmentSchedule->id}}>Remove</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
