<?php
//https://php.programmer-reference.com/php-datetime-modify/
//日時の加算、減算
// $date = new DateTime();
// $date->modify('+6 hours');                     // 6時間後
// $date->modify('+1 weeks');                     // 1週間後
// $date->modify('+1 months + 2 days + 3 hours'); // 1ヶ月2日3時間後
// $date->modify('noon');                         // 正午に
// $date->modify('first day of this months');     // 当月1日
// $date->modify('last day of this months');      // 当月末尾
// $date->modify('first day of next months');     // 来月1日
// $date->modify('first day of last months');     // 先月1日
// $date->modify('sunday');                       // 次の日曜日
// $date->modify('monday this week');             // 今週の月曜日
// $date->modify('third sunday of this months')   // 第三日曜日
// $date->modify('first day of midnight previous month'); // 先月初日
// $date->modify('last day of previous month'); // 先月末日
//指定の年月
//     $Month = '2016-02';
//     //月初め
//     $startDate = new DateTime('first day of ' . $Month);

//$date->add   ~(日時)後
//$date->sub　~(日時)前
namespace Myapp;

class Calendar {
    public $prev;
    public $next;
    public $month;
    public $yearMonth;
    public $yearMonth_t;
    private $_thisMonth;

    public function __construct() {
        try {
        	//URLのゲットパラメーターから日付を取得するように設定
            if (!isset($_GET['t']) || !preg_match('/\A\d{4}-\d{2}\z/', $_GET['t'])) {
            throw new \Exception();
            }
            $this->_thisMonth = new \DateTime($_GET['t']);
        } catch (\Exception $e) {
        $this->_thisMonth = new \DateTime('first day of this month');
        }

        $this->month = $this->_createTodayLink();
        $this->prev = $this->_createPrevLink();
        $this->next = $this->_createNextLink();

        //https://www.php.net/manual/ja/function.date.php
        //ここでは設定された月をフォーマット
        $this->yearMonth = $this->_thisMonth->format('M Y');
        $this->yearMonth_t = $this->_thisMonth->format('Y年n月');
    }
    private function _createTodayLink() {
        $dt = new \DateTime('first day of this month');
        return $dt->format('Y-m');
    }

    private function _createPrevLink() {
    	//objectは参照型なので，代入先でプロパティを変更したときに代入元と共通のものを操作してしまう
    	//これを回避するには clone を使って中身のデータだけを渡すようにすればよい。
        $dt = clone $this->_thisMonth;
        return $dt->modify('-1 month')->format('Y-m');
    }

    private function _createNextLink() {
        $dt = clone $this->_thisMonth;
        return $dt->modify('+1 month')->format('Y-m');
    }

    public function show() {
        $tail = $this->_getTail();
        $body = $this->_getBody();
        $head = $this->_getHead();
        $html = '<tr>' . $tail . $body . $head . '</tr>';
        echo $html;
    }

    private function horiDay(){
        $horidays = array();
        $horiname = array();

        // 内閣府ホームページの"国民の祝日について"よりデータを取得する
        //取得したデータ(CSV)の型に合わせて、formatしていく(Y/n/j)
        //$res = file_get_contents('https://www8.cao.go.jp/chosei/shukujitsu/syukujitsu.csv');
        //$res = file_get_contents('http://www8.cao.go.jp/chosei/shukujitsu/syukujitsu_kyujitsu.csv');
        $res = file_get_contents('./syukujitsu.csv');

        $res = mb_convert_encoding($res, "UTF-8", "SJIS");
        $pieces = explode("\r\n", $res);
        $dummy = array_shift($pieces);
        $dummy = array_pop($pieces);

        foreach ($pieces as $key => $value) {
            $temp = explode(',', $value);
            $horidays[] = $temp[0];  //日付を設定
            $horiname[] = $temp[1];  //祝日名を設定
        }
        return $horidays;
    }

    //前月
    private function _getTail() {
        $tail = '';
        $lastDayOfPrevMonth = new \DateTime('last day of' . $this->yearMonth . ' -1 month');
        while ($lastDayOfPrevMonth->format('w') < 6) {
            $tail = sprintf('<td class="gray">%d</td>', $lastDayOfPrevMonth->format('d')) . $tail;
            $lastDayOfPrevMonth->sub(new \DateInterval('P1D'));
        }
        return $tail;
    }

    //今月
    private function _getBody() {
        $body = '';
        // #DatePeriod：特定の期間の日付オブジェクトを作成
        $period = new \DatePeriod(
        // #その月の月始まりだよと宣言
            new \DateTime('first day of' . $this->yearMonth),
            // #1日毎の日付データを取得
            new \DateInterval('P1D'),
            // #次の月までの日付を取得(次の月の表示はされない)
            new \DateTime('first day of' . $this->yearMonth . ' +1 month')
        );
        $today = new \DateTime('today');
        foreach ($period as $day) {
            //var_dump($day->format('Y/n/j'));


        	// #wで日曜日が0月曜日が１となるので、それを７で割った時の余りが０のときに行変えをしていくs
            if ($day->format('w') === '0') { $body .= '<tr></tr>'; }
            //   sprintf    //%s」には文字列を、「%d」には数値を代入することができる
			//   //format(w) = 0 (日曜)から 6 (土曜)つまり曜日
			//   //format(d) =  01 から 31

            $todayClass = ($day->format('Y-m-d')  === $today->format('Y-m-d')) ? 'today' : '';

            //祝日格納(日付のみ)
            $horiday = $this->horiDay();

            $ind = array_search($day->format('Y/n/j'),$horiday);

            if($ind){
                $body .= sprintf('<td class="youbi_%d %s">%d</td>', 0,$todayClass, $day->format('d'));
            }else{
                $body .= sprintf('<td class="youbi_%d %s">%d</td>', $day->format('w'),$todayClass, $day->format('d'));
            }

        }
        return $body;
    }

    //翌月
    private function _getHead() {
        $head = '';
        $firstDayOfNextMonth = new \DateTime('first day of' . $this->yearMonth . ' +1 month');
        while ($firstDayOfNextMonth->format('w') > 0) {
            $head .= sprintf('<td class="gray">%d</td>', $firstDayOfNextMonth->format('d'));
            $firstDayOfNextMonth->add(new \DateInterval('P1D'));
        }
        return $head;
    }
}