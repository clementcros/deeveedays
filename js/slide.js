$().ready(function() {
    fades();
    fadestextes();
});
function fades () {
    $('.fadein div:nth-of-type(1)').delay(0).fadeIn().delay(5000).fadeOut();
    $('.fadein div:nth-of-type(2)').delay(5100).fadeIn().delay(10500).fadeOut();
    $('.fadein div:nth-of-type(3)').delay(10600).fadeIn().delay(15000).fadeOut();
    setTimeout(function() {
        $('.fadein div:nth-of-type(2)').fadeOut().delay(1000);
        $('.fadein div:nth-of-type(3)').fadeOut().delay(1200);
        fades();
    });
}
//function fadestextes () {
//  
//    setTimeout(function() {
//            $('.fadein div:nth-of-type(2)').fadeOut();
//        $('.fadein div:nth-of-type(3)').fadeOut();
//        fadestextes();
//    });
//}