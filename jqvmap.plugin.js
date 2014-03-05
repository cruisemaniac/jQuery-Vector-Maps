/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function($) {
    
    $('#vmap').vectorMap({
        map: 'usa_en',
        enableZoom: false,
        showTooltip: true,
        selectedRegion: 'NY',
        onRegionClick: function(element, code, region) {
            window.location = region.replace(/ /g, "-");
        }
    });
});