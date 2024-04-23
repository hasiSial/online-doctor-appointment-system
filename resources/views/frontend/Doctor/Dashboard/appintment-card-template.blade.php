<div class="row border border-1 rounded mt-2">
    <div class="col-md-7">
        <div class="row p-2 justify-content-center">
            <div class="col-md-4 col-4">
                <img class="w-100 border border-1 rounded" src="{{ asset('storage/users/'. ($appointment->patient->user->image )) }}" alt="Patient Image">
            </div>
            <div class="col-md pt-sm-3 patient-card-content">
                <h5>{{$appointment->patient->user->first_name}} {{$appointment->patient->user->last_name}}</h5>
                <span>
                    <i class="fas fa-clock"></i>
                    {{$appointment->appointment_date}}, {{$appointment->appointment_time}}
                </span>
                <br>
                <span>
                    <i class="fas fa-map-marker-alt"></i>
                    {{$appointment->patient->user->city}}, {{$appointment->patient->user->state}}, {{$appointment->patient->user->country}}
                </span>
                <br class="mt-1">
                <span>
                    <i class="fas fa-envelope"></i>
                    {{$appointment->patient->user->email}}
                </span>
                <br class="mt-1 mb-1">
                <span>
                    <i class="fas fa-phone"></i>
                    {{$appointment->patient->user->phone}}
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-5 d-flex align-items-center justify-content-center">
        <div class="form-group mt-3 me-3">
            <select class="form-select form-select-sm statusSelect" data-appointId="{{ $appointment->id }}" id="statusSelect" style="background-color: #E2F6ED; color: #2CAF48;">
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approve" {{ $appointment->status == 'approve' ? 'selected' : '' }}>Approve</option>
                <option value="complete" {{ $appointment->status == 'complete' ? 'selected' : '' }}>Complete</option>
            </select>
        </div>
        <a href="{{route('appointmentDelete',$appointment->id)}}" class="rounded mb-2" style="padding:5px 10px; background:#FDE2E7;text-decoration:none; color:#E63C3C">
            <i class="fas fa-times"></i> Reject
        </a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    $(document).ready(function() {
        $('.statusSelect').off('change').on('change', function() {
            var selectedValue = $(this).val();
            var appointID = $(this).data('appointid');

            $.ajax({
                url: '{{ route("appointments.statusUpdate") }}'
                , method: 'post'
                , data: {
                    '_token': '{{ csrf_token() }}'
                    , 'status': selectedValue
                    , 'appointId': appointID
                }
                , success: function(response) {

                    toastr.success('Appointment Status Update Successfully!');
                    window.location.reload();
                    console.log(response);
                }
                , error: function(xhr, status, error) {
                    toastr.error('Appointment Status Update Failed!');
                    console.log(error);
                }
            });
        });
    });

</script>
