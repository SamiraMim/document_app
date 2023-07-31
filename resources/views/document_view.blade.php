@extends('layout.main')
@section('style')
    <style>
        .content {
            margin: 40px auto;
            text-align: center;
            border: 2px solid gray;
            padding: 10px;
        }
        .content form button {
            padding: 10px 20px;
            margin: 20px;
        }

        .content form label.choice {
            cursor: pointer;
            border: 1px solid #f8f8f8;
            width: auto;
            transition: all 0.3s ease-in-out;
        }       
        .content form label.choice span {
            display: inline-block;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
        }
        .content form label.choice  input[type="radio"]:checked ~ * { 
            background-color:  #ffc107;
        }
    </style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-8 content">
        <h1>Document</h1>
        <p>{{ $document->content}}</p>
        <form method="POST" action="{{ route('updateDocumentStatus', ['id' =>  $document->id])}}">
            @csrf
            <label class="choice">
                <input type="radio" name="status" id="cancel" value="3" @if ($document->status == 3) checked @endif >
                <span>انصراف</span>
            </label>
            <label class="choice">
                <input type="radio" name="status" id="review" value="2" @if ($document->status == 2) checked @endif>
                <span>بررسی</span>
            </label>
            <label class="choice">
                <input type="radio" name="status" id="submit" value="1" @if ($document->status == 1) checked @endif>
                <span>ثبت</span>
            </label>
            <br>
            <button type="submit" class="btn btn-secondary">ارسال</button>
        </form>
    </div>
</div>
@endsection