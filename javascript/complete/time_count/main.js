function calc_1(){
    //1時間は3600秒
    let total_num = document.getElementById('total_num').value; //クレープ総個数
    let persons   = document.getElementById('persons').value;    //つくる人数
    let hours   = document.getElementById('create_hour').value; //時間
    let result =(total_num / persons);
    let per_hour = (total_num / persons / hours);//四捨五入
    let per_min  = (per_hour / 60);
    let per_sec  = (per_min / 60);
    let per_num  = (1/per_sec);
    
    let per_num_s6  = (per_num * 6);
    let per_num_6  = (per_num * 6 % 60);
    let per_num_m6 = (per_num_s6 % 3600 / 60 |0);
    
    let per_num_s36  = (per_num * 36);
    let per_num_36  = (per_num * 36 % 60);
    let per_num_m36  = (per_num_s36 % 3600 / 60 |0);
    
    let fixed_result = result.toFixed(1);
    let fixed_per_min = per_min.toFixed(1);
    let fixed_per_hour = per_hour.toFixed(0);
    let fixed_per_num = per_num.toFixed(1);
    let fixed_per_num_6 = per_num_6.toFixed(1);
    let fixed_per_num_m6 = per_num_m6.toFixed(1);
    let fixed_per_num_36 = per_num_36.toFixed(1);
    let fixed_per_num_m36 = per_num_m36.toFixed(1);

    document.getElementById('per_per_p').innerHTML = fixed_result;
    document.getElementById('hour_num_1').innerHTML = fixed_per_hour;
    
    document.getElementById('min_num_1').innerHTML = fixed_per_min;
    document.getElementById('per_sec_1').innerHTML = fixed_per_num;
    document.getElementById('per_sec_6').innerHTML = fixed_per_num_6;
    document.getElementById('per_sec_m6').innerHTML = fixed_per_num_m6;
    document.getElementById('per_sec_36').innerHTML = fixed_per_num_36;
    document.getElementById('per_sec_m36').innerHTML = fixed_per_num_m36;

	return;
}

function calc_2(){

    let hours2   = document.getElementById('create_hour2').value; //時間
    let min2     =document.getElementById('create_min2').value; //分
    let break_min     =document.getElementById('break_min').value; //分
    let nowDate = new Date();
    let now_time = nowDate.getTime();//現在の日次を秒に"2013/01/23 12:34"
    let today = ''+nowDate.getFullYear()+'/'+(nowDate.getMonth()+1)+'/'+nowDate.getDate();//現在の完全な日付
    let goal_time = new Date(today+' '+hours2+':'+min2).getTime();//後何時間を秒に変換
    let b_min =(break_min * 60 * 1000);   // 休憩時間をミリ秒に
    let sub_sec = goal_time - now_time - b_min ;
    // 差のミリ秒を、日数・時間・分・秒に分割
    //let dDays = tes / ( 1000 * 60 * 60 * 24 );   // 日数
    //diff2Dates = tes % ( 1000 * 60 * 60 * 24 );
    let dHour = sub_sec / ( 1000 * 60 * 60  );   // 時間
    let dMin = sub_sec / ( 1000 * 60 );// 分
    let dSec = sub_sec / 1000;// 秒
    
    if( sub_sec < 0) {
    msg = "指定した時刻は過ぎました。";
   alert(msg);
}else{
    msg  = "正常に計算されます";
    alert(msg);
    let total_num2 = document.getElementById('total_num').value;
    let persons2   = document.getElementById('persons').value;
    let result2 = total_num2/persons2;
    
    let per_sec2 = (result2/ dSec);
    let per_min2 = (result2 / dMin);
    let per_hour2 = (result2 / dHour);
    let per_num2  = (1/per_sec2);
    
    let per_num_s6_2  = (per_num2 * 6);
    let per_num_6_2  = (per_num2 * 6 % 60);
    let per_num_m6_2 = (per_num_s6_2 % 3600 / 60 |0);
    
    let per_num_s36_2  = (per_num2 * 36);
    let per_num_36_2  = (per_num2 * 36 % 60);
    let per_num_m36_2  = (per_num_s36_2 % 3600 / 60 |0);
    
    let fixed_result2 = result2.toFixed(1);
    let fixed_per_min2 = per_min2.toFixed(1);
    let fixed_per_hour2 = per_hour2.toFixed(0);
    let fixed_per_num2 = per_num2.toFixed(1);
    let fixed_per_num_6_2 = per_num_6_2.toFixed(1);
    let fixed_per_num_m6_2 = per_num_m6_2.toFixed(1);
    let fixed_per_num_36_2 = per_num_36_2.toFixed(1);
    let fixed_per_num_m36_2 = per_num_m36_2.toFixed(1);
    
    document.getElementById('result2').innerHTML = fixed_result2;
    document.getElementById('hour_num_2').innerHTML = fixed_per_hour2;
    document.getElementById('min_num_2').innerHTML = fixed_per_min2;
    document.getElementById('per_sec_1_2').innerHTML = fixed_per_num2;
    document.getElementById('per_sec_6_2').innerHTML = fixed_per_num_6_2;
    document.getElementById('per_sec_m6_2').innerHTML = fixed_per_num_m6_2;
    document.getElementById('per_sec_36_2').innerHTML = fixed_per_num_36_2;
    document.getElementById('per_sec_m36_2').innerHTML = fixed_per_num_m36_2;
	}
	return;
}


function calc_3(){

    let time   = document.getElementById('byo').value;
    let one_time  = (3600 / time);
    let one_time_3  = (10800 / time);
    let six_time  = (one_time * 6);
    let six_time_3  = (one_time_3 * 6);
    let thirtysix_time  =(one_time * 36);
    let thirtysix_time_3  =(one_time_3 * 36);
    
    let fixed_thirtysix_time = parseInt(thirtysix_time);
    let fixed_six_time = parseInt(six_time);
    let fixed_one_time = parseInt(one_time);
    let fixed_thirtysix_time_3 = parseInt(thirtysix_time_3);
    let fixed_six_time_3 = parseInt(six_time_3);
    let fixed_one_time_3 = parseInt(one_time_3);
    
    
    document.getElementById('six_time').innerHTML = fixed_six_time;
    document.getElementById('one_time').innerHTML = fixed_one_time;
    document.getElementById('thirtysix_time').innerHTML = fixed_thirtysix_time;
    document.getElementById('six_time_3').innerHTML = fixed_six_time_3;
    document.getElementById('one_time_3').innerHTML = fixed_one_time_3;
    document.getElementById('thirtysix_time_3').innerHTML = fixed_thirtysix_time_3;

    return;
}
