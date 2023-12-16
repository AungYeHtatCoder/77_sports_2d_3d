@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

 <!-- content -->
 <div class="container-fluid py-5 mt-5">
    <!-- sub menu -->
    <div class="rounded-4 border border-1 shadow-lg">
        <div class="d-flex justify-content-around text-center">
            <a href="{{ route('user.wallet.topup') }}" class="d-block text-decoration-none pt-3">
                <i class="fa-solid fa-money-bill-1" style="font-size: 25px"></i>
                <p style="font-size: 12px" class="mt-2">ငွေဖြည့်</p>
            </a>
            <a href="{{ route('user.wallet.withdraw') }}" class="d-block text-decoration-none pt-3">
                <i class="fa-solid fa-money-bill-transfer" style="font-size: 25px"></i>
                <p style="font-size: 12px" class="mt-2">ငွေထုတ်</p>
            </a>
            {{-- <a href="" class="d-block text-decoration-none pt-3">
                <i class="fa-solid fa-coins" style="font-size: 25px"></i>
                <p style="font-size: 12px" class="mt-2">ဂိမ်းပိုက်ဆံအိတ်</p>
            </a> --}}
            <a href="" class="d-block text-decoration-none pt-3">
                <i class="fa-solid fa-pen-to-square" style="font-size: 25px"></i>
                <p style="font-size: 12px" class="mt-2">မှတ်တမ်း</p>
            </a>
        </div>
    </div>
    <!-- sub menu -->

    <!-- user guide -->
    <div class="rounded-4 border border-2 btn-purple p-3 my-5">
        <p class="text-center">ငွေဖြည့်လိုပါက</p>
        <p>၁။ "ငွေဖြည့်" ကို နှိပ်ပါ။</p>
        <p>၂။ KBZ Pay, Wave Pay, CB Pay, နှင့် AYA Pay တို့မှ မိမိငွေဖြည့်မည့် ဘဏ်ကိုရွေးပါ။</p>
        <p>၃။ သက်ဆိုင်ရာ Pay ဖြင့်  ငွေသွင့်နိုင်သော အကောင့်များ ပေါ်လာပါလိမ့်မည်။</p>
    </div>
    <!-- user guide -->

</div>
<!-- content -->

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

