@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

<!-- content -->
<div class="container-fluid py-5 my-5">
    <!-- header -->
    <p class="text-center">ငွေထုတ်မည်</p>
    <p class="text-start mb-5">ငွေထုတ်ရန် Logo ပုံကို နှိပ်ပါ</p>
    <!-- header -->
    <!-- sub menu -->
    <div class="">
        <div class="d-flex justify-content-around text-center">
            <button class="btn bankCheck" id="kpay">
                <img src="{{ asset('user_app/assets/img/banking/kpay.png') }}" class="rounded-2" width="60px" alt="">
            </button>
            <button class="btn" id="wpay">
                <img src="{{ asset('user_app/assets/img/banking/wpay.png') }}" class="rounded-2" width="60px" alt="">
            </button>
            <button class="btn" id="cbpay">
                <img src="{{ asset('user_app/assets/img/banking/cbpay.png') }}" class="rounded-2" width="60px" alt="">
            </button>
            <button class="btn" id="ayapay">
                <img src="{{ asset('user_app/assets/img/banking/aya_logo.png') }}" class="rounded-2" width="60px" alt="">
            </button>
        </div>
    </div>
    <p class="text-center mt-5">လက်ကျန်ငွေ: 0 ကျပ်</p>
    <hr>
    <!-- sub menu -->

    <!-- payment form -->
    <div class="">
        <p class="text-start">ငွေဖြည့်ပမာဏ <span id="bankName">(KBZ Pay)</span></p>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="amount">
            </div>
            <div class="d-flex justify-content-between mb-4">
                <span class="d-block btn btn-outline-light w-100" id="oneT">
                    1,000
                </span>
                <span class="d-block btn btn-outline-light w-100 mx-4" id="fiveT">
                    5,000
                </span>
                <span id="tenT" class="d-block btn btn-outline-light w-100">
                    10,000
                </span>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <span id="oneL" class="d-block btn btn-outline-light w-100">
                    100,000
                </span>
                <span class="d-block btn btn-outline-light w-100 mx-4" id="twoL">
                    200,000
                </span>
                <span id="fiveL" class="d-block btn btn-outline-light w-100">
                    500,000
                </span>
            </div>
            <button class="btn btn-purple bg-purple text-white w-100">
                ဆက်လုပ်ရန်
            </button>
        </form>

    </div>
    <!-- payment form -->

</div>
<!-- content -->

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

