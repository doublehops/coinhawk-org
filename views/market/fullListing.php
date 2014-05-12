<?php

foreach($markets as $market) {
    echo $this->render('_chart', ['market'=>$market, 'period'=>$period]);
}
