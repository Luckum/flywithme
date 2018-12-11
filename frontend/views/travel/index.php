<?php
    
use Yii;

$this->title = Yii::t('app', 'Search Results');
/*$script = <<<JS
    $(function () {
        $.ajax({
            url: "/travel/get-results",
            type: "POST",
            data: {from: $from, to: $to, adults: $adults, children: $children, infants: $infants, trip_class: $trip_class, date_from: $date_from, date_to: $date_to},
            success: function(data) {
                
            }
        });
    });
JS;
$this->registerJs($script, $this::POS_END);*/
?>
<div class="search-results">
    <div class="col-md-3" style="background-color: #fff; margin-top: 15px; border-radius: 10px;">
        Some filters
    </div>
    <div class="col-md-9">
    <div class="tickets-item">
        <div class="ticket-body">
            <div class="aviacompany-logo">
                <img src="http://pics.avs.io/75/75/UN.png">
            </div>
            <div class="ticket-content">
                <div class="ticket-info-from">
                    <div class="ticket-time text-right">11:55</div>
                    <div class="ticket-place text-right">Simferopol International Airport</div>
                </div>
                <div class="ticket-direct">
                    <p>02h 50m</p>
                    <div class="direct-arrow">
                        <div class="direct-point"></div>
                        <div class="direct-point"></div>
                    </div>
                </div>
                <div class="ticket-info-to">
                    <div class="ticket-time">14:45</div>
                    <div class="ticket-place">Sheremetyevo International Airport</div>
                </div>
            </div>
        </div>
        <div class="ticket-links">
            <div class="ticket-best-company">MyHolidays</div>
            <div class="ticket-best-book"><a href="javascript:void(0);" class="btn btn-info"><span class="book-btn-title">book for</span>$ 56.85</a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">City.Travel</span><span class="book-other-price text-right">$ 65.00</span></a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">Kiwi.com</span><span class="book-other-price text-right">$ 70.00</span></a></div> 
        </div>
    </div>
    <div class="tickets-item">
        <div class="ticket-body">
            <div class="aviacompany-logo">
                <img src="http://pics.avs.io/75/75/UN.png">
            </div>
            <div class="ticket-content">
                <div class="ticket-info-from">
                    <div class="ticket-time text-right">11:55</div>
                    <div class="ticket-place text-right">Simferopol International Airport</div>
                </div>
                <div class="ticket-direct">
                    <p>02h 50m</p>
                    <div class="direct-arrow">
                        <div class="direct-point"></div>
                        <div class="direct-point"></div>
                    </div>
                </div>
                <div class="ticket-info-to">
                    <div class="ticket-time">14:45</div>
                    <div class="ticket-place">Sheremetyevo International Airport</div>
                </div>
            </div>
        </div>
        <div class="ticket-links">
            <div class="ticket-best-company">MyHolidays</div>
            <div class="ticket-best-book"><a href="javascript:void(0);" class="btn btn-info"><span class="book-btn-title">book for</span>$ 56.85</a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">City.Travel</span><span class="book-other-price text-right">$ 65.00</span></a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">Kiwi.com</span><span class="book-other-price text-right">$ 70.00</span></a></div> 
        </div>
    </div>
    <div class="tickets-item">
        <div class="ticket-body">
            <div class="aviacompany-logo">
                <img src="http://pics.avs.io/75/75/UN.png">
            </div>
            <div class="ticket-content">
                <div class="ticket-info-from">
                    <div class="ticket-time text-right">11:55</div>
                    <div class="ticket-place text-right">Simferopol International Airport</div>
                </div>
                <div class="ticket-direct">
                    <p>02h 50m</p>
                    <div class="direct-arrow">
                        <div class="direct-point"></div>
                        <div class="direct-point"></div>
                    </div>
                </div>
                <div class="ticket-info-to">
                    <div class="ticket-time">14:45</div>
                    <div class="ticket-place">Sheremetyevo International Airport</div>
                </div>
            </div>
        </div>
        <div class="ticket-links">
            <div class="ticket-best-company">MyHolidays</div>
            <div class="ticket-best-book"><a href="javascript:void(0);" class="btn btn-info"><span class="book-btn-title">book for</span>$ 56.85</a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">City.Travel</span><span class="book-other-price text-right">$ 65.00</span></a></div>
            <div class="ticket-other-link"><a href="javascript:void(0);"><span class="book-other-title">Kiwi.com</span><span class="book-other-price text-right">$ 70.00</span></a></div> 
        </div>
    </div>
    </div>
</div>