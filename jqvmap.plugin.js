/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var strip, strcountry, strcity, strregion, strlatitude, strlongitude, strtimezone;
jQuery(document).ready(function($) {

$.getJSON('http://smart-ip.net/geoip-json/?callback=?', function(data) {
    strip = data.host; strcountry = data.countryCode; strcity = data.city;
    strregion = data.region; strlatitude = data.latitude; strlongitude = data.longitude;
    strtimezone = data.timezone;
    if(strcountry !== 'US') strregion = 'NY';

 $('#vmap').vectorMap({
        map: 'usa_en',
        enableZoom: false,
        backgroundColor: null,
        showTooltip: true,
        selectedRegion: (strregion !== null)? strregion : 'NY' ,
        onRegionClick: function(element, code, region) {
            window.location = region.replace(/ /g, "-");
        }
    });
});
});

function GetUserInfo(data) {
    strip = data.host; strcountry = data.countryName; strcity = data.city;
    strregion = data.region; strlatitude = data.latitude; strlongitude = data.longitude;
    strtimezone = data.timezone;
    jQuery.holdReady(true);
    //if(strcountry
    vmap(true);

}

function vmap(us) {
    if(us === false)
       strregion = 'NY';

    jQuery.holdReady(false);
   
}