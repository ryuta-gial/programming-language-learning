$(function(){

 

    $("#sendButton").click(function(){

 

        //値の初期化

        init();

        //TEXTのエラーチェック       

        var textDataArr = $('input[type=text] , textarea ');

 

        textDataArr.each(function(){

                var tmp_val = $(this).val();

                if( tmp_val === "" ) $(this).css('background-color', "#FFC0CB");     

        });

       

//        var textDataArrCnt = textDataArr.length;

//

//        for (var i =0;i<textDataArrCnt;i++)

//        {

//            if (textDataArr[i]['value'] === '' )

//            {

//                textDataArr[i].css('background-color', "#FFC0CB");

//            }

//

//        }

//

            //radioのエラーチェック

            var radioData = $('input[type=radio]:checked').val();

            if (radioData === undefined ) {

                $("#radio_area").css('background-color','#FFC0CB');

            }

            //selectのエラーチェック

            var selectData = $('select[name=occupation]').val();

            if (selectData === '')

                $("select[name=occupation]").css('background-color','#FFC0CB');

 

            //checkbxのエラーチェック

            var checkBoxArr = $('input[type=checkbox]');

            var checkBoxArrCnt = checkBoxArr.length;

            var checkBoxFlg = false;

            for (var i=0;i<checkBoxArrCnt;i++)

            {

                if (checkBoxArr[i].checked === true ) checkBoxFlg = true;

            }

            if (checkBoxFlg === false )$("#check_area").css('background-color',"#FFC0CB");

        });

 

            //色の初期化

 

            function init()

            {

                $('input[type=text] , textarea').css("background-color","");

                $('#radio_area').css("background-color","");

                $("select[name=occupation]").css('background-color','');

                $("#check_area").css('background-color','')

            }

});