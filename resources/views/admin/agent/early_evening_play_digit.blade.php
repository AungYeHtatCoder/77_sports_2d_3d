@extends('layouts.admin_app')
@section('styles')
<style>
.transparent-btn {
 background: none;
 border: none;
 padding: 0;
 outline: none;
 cursor: pointer;
 box-shadow: none;
 appearance: none;
 /* For some browsers */
}
</style>
@endsection
@section('content')
<div class="row mt-4">
 <div class="col-12">
  <div class="card">
   <!-- Card header -->
   <div class="card-header pb-0">
    <div class="d-lg-flex">
     <div>
      <h5 class="mb-0">User List Dashboards</h5>

     </div>
     <div class="ms-auto my-auto mt-lg-0 mt-4">
      <div class="ms-auto my-auto">
       <a href="{{ url('/admin/agent-user-create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Create New
        User</a>
       <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button"
        name="button">Export</button>
      </div>
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <h4 class="text-center">12:1 PM Evening Two-Digit Plays</h4>

    @if ($lotteries->isEmpty())
        <p>No lottery plays found for this period.</p>
    @else
        <p class="text-center">Lottery plays for {{ $lotteries->first()->created_at->format('d-m-Y') }} to {{ $lotteries->last()->created_at->format('d-m-Y') }}</p>
    
    <table class="table table-flush" id="users-search">
     
      <thead>
                <tr>
                    {{-- <th>Player Name</th> --}}
                    <th>Two-Digit Numbers</th>
                    {{-- <th>Total Amount</th> --}}
                   <th>Prize Sent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lotteries as $lottery)
                    <tr>
                        {{-- <td>{{ $lottery->user->name }}</td> --}}
                        {{-- <td>{{ $lottery->id }}</td> --}}
                        <td>
                            <ul>
                            @foreach ($lottery->twoDigitsEarlyEvening as $twoDigit)
                                <li>
                                    <span class="badge bg-secondary">
                                   {{ $twoDigit->two_digit }}
                                 </span>
                                    Amount:
                                    <span class="badge bg-secondary">
                                        {{ $twoDigit->pivot->sub_amount }}
                                    </span> -
                                    {{ $twoDigit->pivot->created_at->format('d M Y (l) (h:i a)') }}
                                </li>
                            @endforeach
                        </ul>
                        </td>
                        {{-- <td>{{ $lottery->total_amount }}</td> --}}
                        <td>
                         <ul>
                          @foreach ($lottery->twoDigitsEarlyEvening as $twoDigit)
                              <li>

                                  <!-- Check if it's a winner -->
                                  @if ($prize_no_morning && $twoDigit->two_digit === $prize_no_morning->prize_no)
                                      <span class="badge badge-success">WINNER</span>
                                  @endif
                              </li>
                          @endforeach
                      </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>

    </table>
    @endif
   </div>
  </div>
 </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin_app/assets/js/plugins/datatables.js') }}"></script>
{{-- <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script> --}}
<script>
if (document.getElementById('users-search')) {
 const dataTableSearch = new simpleDatatables.DataTable("#users-search", {
  searchable: true,
  fixedHeight: false,
  perPage: 7
 });

 document.querySelectorAll(".export").forEach(function(el) {
  el.addEventListener("click", function(e) {
   var type = el.dataset.type;

   var data = {
    type: type,
    filename: "material-" + type,
   };

   if (type === "csv") {
    data.columnDelimiter = "|";
   }

   dataTableSearch.export(data);
  });
 });
};
</script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
 return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
@endsection