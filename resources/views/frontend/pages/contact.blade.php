@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

 <!-- content -->
 <div class="container-fluid py-5 my-4">
    <!-- Top Up and Withdraw action section  -->
    <div class="mt-4">
      <div>
        <h6 class="mb-4">K-pay ဖြင့်ငွေအသွင်း၊ အထုတ် ပြုလုပ်ပေးမည့်ဖုန်းနံပါတ်များ</h6>
        <div class="bg-transparent border-purple rounded-3 mb-3 px-3 py-2">
            <div class="d-flex justify-content-between">
              <div class="pt-2">
                <h6>0987654321</h6>
              </div>
                <div class="">
                    <a href="tel:0987654321" class="btn">
                        <i class="fas fa-phone-volume text-success"></i>
                    </a>
                    <a href="viber://chat?number=0987654321" class="btn">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-transparent border-purple rounded-3 mb-3 px-3 py-2">
            <div class="d-flex justify-content-between">
              <div class="pt-2">
                <h6>0987654321</h6>
              </div>
                <div class="">
                    <a href="tel:0987654321" class="btn">
                        <i class="fas fa-phone-volume text-success"></i>
                    </a>
                    <a href="viber://chat?number=0987654321" class="btn">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>
            </div>
        </div>
      </div>
      <div class="mt-5">
        <h6 class="mb-4">Wave-pay ဖြင့်ငွေအသွင်း၊ အထုတ် ပြုလုပ်ပေးမည့်ဖုန်းနံပါတ်များ</h6>
        <div class="bg-transparent border-purple rounded-3 mb-3 px-3 py-2">
            <div class="d-flex justify-content-between">
              <div class="pt-2">
                <h6>0987654321</h6>
              </div>
                <div class="">
                    <a href="tel:0987654321" class="btn">
                        <i class="fas fa-phone-volume text-success"></i>
                    </a>
                    <a href="viber://chat?number=0987654321" class="btn">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-transparent border-purple rounded-3 mb-3 px-3 py-2">
            <div class="d-flex justify-content-between">
              <div class="pt-2">
                <h6>0987654321</h6>
              </div>
                <div class="">
                    <a href="tel:0987654321" class="btn">
                        <i class="fas fa-phone-volume text-success"></i>
                    </a>
                    <a href="viber://chat?number=0987654321" class="btn">
                        <i class="fa-brands fa-viber"></i>
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="mt-4">
      <h6 class="text-center">အောက်ပါ ချန်နယ်များမှလည်း ဆက်သွယ်နိုင်ပါတယ် ခင်ဗျာ။</h6>
      <div class="my-4 text-center">
        <a href="https://t.me/jobexpressmm" target="_blank" class="text-decoration-none">
            <i class="fa-brands fa-telegram fa-2x"></i>
        </a>
        <a href="https://invite.viber.com/?g2=AQAbveZgo8G0s096LBf5JPpkDxHyD5lDxWejeLiMhcuz5VjU82cJ6zkypli%2BydA2" target="_blank" class="text-decoration-none mx-3">
            <i class="fa-brands fa-viber fa-2x"></i>
        </a>
        <a href="" target="_blank" class="text-decoration-none">
            <i class="fa-brands fa-facebook fa-2x"></i>
        </a>
      </div>

    </div>
  </div>
  <!-- content -->

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

