@foreach (@$data['user']->doctor->dayTime as $appointmentSchedule)
<div class="row">
    <div class="col-sm-12 col-lg-12 mb-4">
        <form action="{{ route('schedule-timing.update', $appointmentSchedule->id) }}" method="POST">
            @csrf
            @method('PUT')
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
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <label for="start-time">Start Time:</label>
                            <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{ @$appointmentSchedule->start_time }}" required>
                            @error('start_time')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="end-time">End Time:</label>
                            <input class="form-control form-control-solid @error('end_time') is-invalid @enderror" type="time" id="end_time" name="end_time[]" value="{{ @$appointmentSchedule->end_time}}" required>
                            @error('end_time')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3 mt-2 d-flex">
                            <input type="hidden" name="appointID" value="{{$appointmentSchedule->id }}">
                            <button type="submit" class="btn btn-primary mt-4 me-2">Update</button>
                            <button type="submit" class="btn btn-danger mt-4 removeBtn" data-appointid="{{$appointmentSchedule->id}}">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
