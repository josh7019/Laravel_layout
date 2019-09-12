@extends('layout')

@section('style')
<style>
    body {
            font-family: arial,"Microsoft JhengHei","微軟正黑體",sans-serif !important;
            color:#a6a6a6;
            background-color:#1c1c1c; 
            text-align:center;
        }
    .test {
        background-color: #27ae60;
        color: white;
        text-align:center
    }
    .boxOutside {
        background-color: #e9e9e9;
        height:500px;
        text-align:center;
        /* border:solid */
    }
    .boxOutside2 {
        background-color: #f6f6f6;
        height:500px;
        text-align:center;
    }
    .header1 {
        height:50px;
        background-color: #27ae60;
        /* border:solid; */
        color: white;
        text-align:center;
    }
    .header2 {
        height:50px;
        background-color: #ea6153;
        /* border:solid; */
        color: white;
        text-align:center;
    }
    .header3 {
        height:50px;
        background-color: #27ae62;
        /* border:solid; */
        color: white;
        text-align:center;
    }
    .amount {
        height:70px;
        background-color: #f6f6f6;
        /* border:solid; */
        text-align:center;
    }
    
</style>
@endsection

@section('content')

<div class='col-md-4 form-group'> 輸入名稱: <input id='fileName' class='form-control' type="text"></div>

<div class='col-md-12'>
    <div>
        <div class='col-md-4 header1'>123</div>
        <div class='col-md-4 header2'>13</div>
        <div class='col-md-4 header3'>132</div>
    </div>
    <div>
        <div class='col-md-4 amount'>欄位數:<input data-id='0' data-amount='0' class='form-control columChange' type="number" min='0' max='9' value='0'></div>
        <div class='col-md-4 amount'>欄位數:<input data-id='1' data-amount='0' class='form-control columChange' type="number" min='0' max='9' value='0'></div>
        <div class='col-md-4 amount'>欄位數:<input data-id='2' data-amount='0' class='form-control columChange' type="number" min='0' max='9' value='0'></div>
    </div>
    <div id='elementArea'>
        <div class='col-md-4 boxOutside'>
        </div>
        <div class='col-md-4 boxOutside2'></div>
        <div class='col-md-4 boxOutside'></div>
    </div>
    <button id='saveAndDirect'>提交</button>
</div>
@endsection

@section('script')
<script>
    // 增加欄位事件
    $('.columChange').on('input', function() {
        let id = $(this).data('id');
        let amount = $(this).val();
        let preAmount = $(this).data('amount');
        let addOrRemove;
        if (amount > 9 || amount < 0) return;
        addOrRemove = (amount > preAmount) ? true : false;
        let toAdd = $('#elementArea').children().eq(id);
        if (addOrRemove) {
            let addAmount = amount - preAmount;
            for (let i = 0; i < addAmount; i++) {
                toAdd.append('<div>欄位' + (parseInt(preAmount) + i +1) + ":<input class='form-control element" + id + "' type='text' min='0' max='10' value=''></div>")
            }
            $(this).data('amount', amount)
        } else {
            let removeAmount = preAmount - amount; 
            for (let i = 0; i < removeAmount; i++) {
                toAdd.children().eq(toAdd.children().length-1).remove();
            }
            $(this).data('amount', amount)
        }
        console.log()
    })

    // 存檔跳轉
    $('#saveAndDirect').click(function() {
        // 取得所有值存進陣列
        let elementArray = [];
        for (let i = 0 ; i < 3 ; i++) {
            let className = '.element' + i;
            let test = $(className);
            let tempArray = [];
            for (let j = 0 ; j < test.length ; j++) {
                elementArray[elementArray.length] = {
                    'name' : test.eq(j).val(),
                    'type' : i
                };
            }
            
        }
        console.log(elementArray);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type : 'post',
            url : '/user/addbox',
            data : {'elementArray' : elementArray, 'name' : $('#fileName').val()},
            success : function (result_array) {
            // result_array = JSON.parse(result_array);
                showSingal(result_array['alert']);
                direct(result_array['location']);
            }
        })
    })
    
    
</script>
@endsection