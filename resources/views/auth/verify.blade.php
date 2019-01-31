<?php
 $item = auth()->user()->account;
?>
@extends("layouts._account_layout")
@section("title", "لوحة تحكم حساب $item->full_name")


@section("content")

<p class="h4">
مرحباً بك {{ Auth::user()->full_name }}
 </p> 
<div class="row">
    <div class="col-md-8">
<div class="panel panel-default ">
  <div class="panel-heading">
    <h3 class="panel-title">تحقق من عنوان البريد الإلكتروني الخاص بك</h3>
  </div>
  <div class="panel-body">
     @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني
                        </div>
    @endif
<p class="h5">
                    قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني بحثًا عن رابط التحقق. إذا لم تتلق الرسالة الإلكترونية ، <a href="{{ route('verification.resend') }}" > انقر هنا لطلب آخر</a>.
    </p>
     
  </div>
</div>
  </div>
</div> 

@endsection