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
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="row mt-3 repeater ms-1">
                        <div class="col-md-4">
                            <label for="appoint-day">Available Day</label>
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
                        <div class="col-md-2">
                            <label for="start-time">Start Time:</label>
                            <input class="form-control form-control-solid @error('start_time') is-invalid @enderror" type="time" id="start_time" name="start_time[]" value="{{old('end_time') }}" required>
                            @error('start_time')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="end-time">End Time:</label>
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
