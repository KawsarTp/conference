<section class="banner-section bg_img" data-background="{{asset('asset/admin/images/banner').'/'.@$content['banner']['image']}}">
    <div class="banner-shape-two"></div>
    <div class="banner-shape-one"></div>
    <div class="container">
        <div class="banner-content text-center">
            
            <div class="banner-header">
            <h1 class="title">{{@$content['banner']['title']}}</h1>
            <p>{{@$content['banner']['subtitle']}}</p>
            </div>
            <ul class="banner-countdown">
                <li class="theme-style">
                <h2 class="banner-countdown-title"><span class="days" id="day">{{$time['day']}}</span></h2>
                    <p class="days_text">days</p>
                </li>
                <li class="yellow-style">
                    <h2 class="banner-countdown-title"><span class="hours" id="hour">{{$time['hour']}}</span></h2>
                    <p class="hours_text">hours</p>
                </li>
                <li class="grey-style">
                    <h2 class="banner-countdown-title"><span class="minutes" id="min">{{$time['min']}}</span></h2>
                    <p class="minu_text">minutes</p>
                </li>
                <li class="skyblue-style">
                    <h2 class="banner-countdown-title"><span class="seconds" id="sec">{{$time['sec']}}</span></h2>
                    <p class="seco_text">seconds</p>
                </li>
            </ul>
           
        </div>
    </div>
</section>


<script type="text/javascript">
var x = setInterval(function() {
    var days = document.getElementById("day").innerHTML;  
    
    var hours = document.getElementById("hour").innerHTML;
    var minutes = document.getElementById("min").innerHTML;
    var seconds =document.getElementById("sec").innerHTML;
    
      seconds--;
      if (seconds < 0){
          minutes--;
          seconds = 59
      }
      if (minutes < 0){
          hours--;
          minutes = 59
      }
      if (hours < 0){
          days--;
          hours = 23
      }
     
      if(days<0){
        document.getElementById("day").innerHTML = 00;
        document.getElementById("hour").innerHTML = Math.abs(hours);
        document.getElementById("min").innerHTML = Math.abs(minutes);
        document.getElementById("sec").innerHTML = Math.abs(seconds);
    
      }else{
        document.getElementById("day").innerHTML = days;
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("min").innerHTML = minutes;
        document.getElementById("sec").innerHTML = seconds;
      }
      
}, 1000);

</script>